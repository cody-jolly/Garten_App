<?php

namespace App\Models;

use App\Models\Database;
use App\Models\Variety;
use App\Models\Vali;

/**
 * Class Garden
 * @package App\Models
 */
// Alters Garden info in DB, gets Garden data from DB for App
// Calculates Garden info for DB and App\Controllers
class Garden
{
    protected $gardenId;

    public function __construct()
    {
        if(isset($_SESSION['user']['gardenId'])) {
            $this->gardenId = $_SESSION['user']['gardenId'];
        }
    }

    // Check if garden registration has been completed (as exhibited by gardenBeds table in DB), Return boolean
    public function checkGardenReg()
    {
        return (count($this->getBeds()) > 0);
    }

    // Register basic garden data
    public function registerGarden($data)
    {
        $city = '';
        $country = '';
        $householdSize = '';

        foreach ($data as $key => $value) {
            ${$key} = $value;
        }

        $validate = new Vali();
        if ($validate->validateName($city) == 0 || $validate->validateName($country) == 0 || ($validate->validateInt($householdSize) == 0 || strlen($householdSize) > 4)) {
            return 0;
        }

        $register = new Database();
        $register->query("INSERT INTO city (gardenId, city, country) VALUES (?,?,?) ", [$this->gardenId, $city, $country]);
        $register->query("INSERT INTO gardenHousehold (gardenId, householdSize) VALUES (?,?)", [$this->gardenId, $householdSize]);

        return 1;
    }

    // Register preferred varieties for garden
    public function registerVarieties($data)
    {
        $this->deleteVegPreferredData();
        $varieties = explode(",", $data['varieties']);
        $register = new Database();
        $validate = new Vali();
        $successes = 0;

        foreach ($varieties as $variety) {
            if ($validate->validateInt($variety) == 1 && strlen(strval($variety)) <= 4) {
                $register->query("INSERT INTO vegPreferred (gardenId, vegDataId) VALUES (?,?)", [$this->gardenId, $variety]);
                $successes++;
            }
        }

        if ($successes == count($varieties)) {
            return 1;
        }
        return 0;
    }

    // Update household size of garden
    public function updateHousehold($data)
    {
        $housholdSize = $data['householdSize'];

        $validate = new Vali();
        if ($validate->validateInt($housholdSize) == 1 && strlen(strval($housholdSize)) <= 4) {

            $updateHousehold = new Database();
            $updateHousehold->query("UPDATE gardenHousehold SET householdSize = ? WHERE gardenId = ?", [$housholdSize, $this->gardenId]);

            return 1;
        }

        return 0;
    }

    // Calculate all data for successive sowings/harvests of all varieties in all beds in garden; Add the calculated data to vegProduction table in the DB
    public function calculateVegProduction()
    {
        $this->deleteVegProductionData();

        $beds = $this->getBeds();
        $gardenVarieties = $this->getGardenVarietes();
        $householdSize = $this->getHouseholdSize();
        $bed = 0;
        $totalSowings = [];
        $sowing = 0;
        $bedArea = $beds[$bed]['area'];
        foreach ($gardenVarieties as $variety) {
            array_push($totalSowings, $variety->getTotalSowings());
        }

        // Plan available beds with varieties successively until all beds are filled, or all varieties have been planned
        while ($bed < count($beds) && $sowing < max($totalSowings)) {
            // Go through all varieties for every sowing
            foreach ($gardenVarieties as $variety) {
                // Check if sowing is needed for variety, if so calculate first harvest week, sowing week and variety area for variety
                if ($sowing < $variety->getTotalSowings()) {
                    $firstHarvest = $variety->getFirstHarvest() + ($sowing * $variety->getHarvestWindow());
                    $sowingWeek = $variety->getFirstSowing() + ($sowing * $variety->getHarvestWindow());
                    $varietyArea = ($variety->getQcmPerServing() * $householdSize) * $variety->getHarvestWindow();
                    $vegProductionEntry = new Database();
                    // Fill beds with variety until needed area has been accounted for, move to next bed as needed
                    if ($bedArea > $varietyArea && isset($beds[$bed]['bedNr'])) {
                        $vegProductionEntry->query("INSERT INTO vegProduction (gardenId, bedNr, vegDataId, firstHarvestWeek, sowingWeek, varietyArea, harvestWindow)
                                                        VALUE (?,?,?,?,?,?,?)", [$this->gardenId, $beds[$bed]['bedNr'], $variety->getVegDataId(), $firstHarvest, $sowingWeek, $varietyArea, $variety->getHarvestWindow()]);
                        $bedArea -= $varietyArea;
                    } else {
                        while ($varietyArea > 0 && isset($beds[$bed]['bedNr'])) {
                            $vegProductionEntry->query("INSERT INTO vegProduction (gardenId, bedNr, vegDataId, firstHarvestWeek, sowingWeek, varietyArea, harvestWindow)
                                                            VALUE (?,?,?,?,?,?,?)", [$this->gardenId, $beds[$bed]['bedNr'], $variety->getVegDataId(), $firstHarvest, $sowingWeek, $bedArea, $variety->getHarvestWindow()]);
                            $varietyArea -= $bedArea;
                            $bed++;
                            if (isset($beds[$bed]['area'])) {
                                $bedArea = $beds[$bed]['area'];
                                if ($bedArea > $varietyArea) {
                                    $vegProductionEntry->query("INSERT INTO vegProduction (gardenId, bedNr, vegDataId, firstHarvestWeek, sowingWeek, varietyArea, harvestWindow)
                                                            VALUE (?,?,?,?,?,?,?)", [$this->gardenId, $beds[$bed]['bedNr'], $variety->getVegDataId(), $firstHarvest, $sowingWeek, $varietyArea, $variety->getHarvestWindow()]);
                                    $bedArea -= $varietyArea;
                                    $varietyArea = 0;
                                }
                            } else if(!isset($beds[$bed]['area'])){
                                $varietyArea = 0;
                            }
                        }
                    }
                }
            }
            $sowing++;
        }
    }

    // Return all possible varieties from DB
    public function getVarieties()
    {
        $varieties = new Database();
        $varieties->query("SELECT variety FROM vegData");
        $varieties = $varieties->results();

        return $varieties;
    }

    // Get preferred varieties for garden from DB, return array of corresponding Variety objects
    public function getGardenVarietes()
    {
        $gardenVarieties = [];
        $getGardenVarieties = new Database();
        $getGardenVarieties->setTable("vegPreferred")->where("gardenId", "=", $this->gardenId);
        foreach ($getGardenVarieties->results() as $getVariety) {
            $variety = new Variety($getVariety['vegDataId']);
            array_push($gardenVarieties, $variety);
        }
        return $gardenVarieties;
    }

    // Return total area of Garden needed for variety
    public function getVarietyTotalArea($vegDataId)
    {
        $getArea = new Database();
        $totalArea = 0;
        $results = $getArea->queryStatement("SELECT varietyArea FROM vegProduction WHERE gardenId = ? AND vegDataId = ?", [$this->gardenId, $vegDataId])->results();
        foreach ($results as $result) {
            $totalArea += intval($result['varietyArea']);
        }
        return $totalArea;
    }

    // Return total amount of sowing of variety in garden
    public function getGardenVarietyTotalSowings($vegDataId)
    {
        $getSowings = new Database();
        return $getSowings->queryStatement("SELECT * FROM vegProduction WHERE gardenId = ? AND vegDataId = ?", [$this->gardenId, $vegDataId])->count();
    }

    // Return household size of garden
    public function getHouseholdSize()
    {
        $getHouseholdSize = new Database();
        return intval($getHouseholdSize->setTable("gardenHousehold")->where("gardenId", "=", $this->gardenId)->first()['householdSize']);
    }

    // Return gardenId
    public function getGardenId()
    {
        return $this->gardenId;
    }

    // Return Bed data for garden
    public function getBeds()
    {
        $getBeds = new Database();
        return $getBeds->setTable("gardenBeds")->where("gardenId", "=", $this->gardenId)->results();
    }

    // Return all data from vegProduction for garden
    public function getVegProductionData()
    {
        $getVPData = new Database();
        return $getVPData->setTable("vegProduction")->where("gardenId", "=", $this->gardenId)->results();
    }

    // Return all data from vegProduction for garden, sorted ascending by sowing week
    public function getProductionPlan()
    {
        $sets = $this->getVegProductionData();
        // adapted from https://www.php.net/manual/en/function.usort.php
        usort($sets, function ($a, $b)
                            {
                                if ($a['sowingWeek'] == $b['sowingWeek']) {
                                    return 0;
                                }
                                return ($a['sowingWeek'] < $b['sowingWeek']) ? -1 : 1;
                            });
        return $sets;
    }

    // Return all data from vegProduction for garden, sorted ascending by first harvest week
    public function getHarvestPlan()
    {
        $sets = $this->getVegProductionData();
        // adapted from https://www.php.net/manual/en/function.usort.php
        usort($sets, function ($a, $b)
        {
            if ($a['firstHarvestWeek'] == $b['firstHarvestWeek']) {
                return 0;
            }
            return ($a['firstHarvestWeek'] < $b['firstHarvestWeek']) ? -1 : 1;
        });
        return $sets;
    }

    // Returns relevant data for garden-profile
    public function getGardenProfileData()
    {
        $gardenProfileData = [];
        $gardenProfileData['household'] = $this->getHouseholdSize();
        $gardenProfileData['varieties'] = $this->getGardenVarietes();
        return $gardenProfileData;
    }

    // Delete all data from vegProduction for garden
    private function deleteVegProductionData()
    {
        $deleteVegProductionData = new Database();
        $deleteVegProductionData->query("DELETE FROM vegProduction WHERE gardenId = ?", [$this->gardenId]);
    }

    // Delete all data from vegPreferred for garden
    private function deleteVegPreferredData()
    {
        $deleteVegPreferredData = new Database();
        $deleteVegPreferredData->query("DELETE FROM vegPreferred WHERE gardenId = ?", [$this->gardenId]);
    }
}