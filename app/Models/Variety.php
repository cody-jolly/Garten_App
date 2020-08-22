<?php


namespace App\Models;

use App\Models\Database;

/**
 * Class Variety
 * @package App\Models
 */
// Retrieves Variety data from DB and can be called with getters
class Variety
{
    private $vegDataId;
    private $varietyName;
    private $weeksToMaturity;
    private $yield;
    private $lowTemp;
    private $qcmPerServing;
    private $firstSowing;
    private $lastSowing;
    private $multipleSowings;
    private $harvestWindow;
    private $firstHarvest;
    private $lastHarvest;
    private $totalSowings;
    private $totalHarvests;

    // Get all variety data form DB, process and format data as necessary for use in the above variables
    public function __construct($vegDataId)
    {
        $this->vegDataId = $vegDataId;

        $getVegData = new Database();
        $vegData = $getVegData->setTable("vegData")->where("id", "=", $vegDataId)->first();

        $this->varietyName = $vegData['variety'];
        $this->weeksToMaturity = intval($vegData['weeksToMat']);
        $this->yield = intval($vegData['yield']);
        $this->lowTemp = $vegData['lowTemp'];
        $this->qcmPerServing = (10000 / $this->yield);
        $this->firstSowing = intval($vegData['firstSowing']);
        $this->lastSowing = intval($vegData['lastSowing']);
        $this->multipleSowings = (intval($vegData['multipleSowings']) > 0);
        $this->harvestWindow = intval($vegData['harvestWindow']);
        $this->firstHarvest = $this->firstSowing + $this->weeksToMaturity;
        if($this->multipleSowings) {
            $this->lastHarvest = $this->lastSowing + $this->weeksToMaturity;
            $this->totalSowings = ceil(($this->lastSowing - $this->firstSowing) / $this->harvestWindow);
            $this->totalHarvests = $this->lastHarvest - $this->firstHarvest;
        } else {
            $this->lastHarvest = $this->firstHarvest + $this->harvestWindow;
            $this->totalSowings = 1;
            $this->totalHarvests = $this->firstHarvest - $this->lastHarvest;
        }
    }

    // Return vegDataID
    public function getVegDataId()
    {
        return $this->vegDataId;
    }

    // Return varietyName
    public function getVarietyName()
    {
        return $this->varietyName;
    }

    // Return weeks to maturity
    public function getWeeksToMaturity()
    {
        return $this->weeksToMaturity;
    }

    // Return yield (servings/m2)
    public function getYield()
    {
        return $this->yield;
    }

    // Return max low temp
    public function getLowTemp()
    {
        return $this->lowTemp;
    }

    // Return servings/cm2
    public function getQcmPerServing()
    {
        return $this->qcmPerServing;
    }

    // Return first sowing week
    public function getFirstSowing()
    {
        return $this->firstSowing;
    }

    // Return last sowing week
    public function getLastSowing()
    {
        return $this->lastSowing;
    }

    // Return if variety is sown more than once (boolean)
    public function getMultipleSowings()
    {
        return $this->multipleSowings;
    }

    // Return first harvest week
    public function getFirstHarvest()
    {
        return $this->firstHarvest;
    }

    // Return last harvest week
    public function getLastHarvest()
    {
        return $this->lastHarvest;
    }

    // Return window of harvest from one sowing (weeks)
    public function getHarvestWindow()
    {
        return $this->harvestWindow;
    }

    // Return total sowings possible in year
    public function getTotalSowings()
    {
        return $this->totalSowings;
    }

    // Return possible weeks of harvest in year
    public function getTotalHarvests()
    {
        return $this->totalHarvests;
    }
}