<?php


namespace App\Models;

use App\Models\Garden;
use App\Models\Database;
use App\Models\Variety;

/**
 * Class Bed
 * @package App\Models
 */
// Alters Bed info in DB, gets Bed data from DB for App
class Bed
{
    private $gardenId;
    private $garden;

    public function __construct()
    {
        $this->garden = new Garden();
        $this->gardenId = $this->garden->getGardenId();
    }

    // Add bed to DB
    public function addBed($data) {
        $bedNr = $data['bedNr'];
        $area = $data['area'];

        $validate = new Vali();
        if ($validate->validateInt($bedNr) == 1 && strlen(strval($bedNr)) <= 4) {
            if ($validate->validateInt($area) == 1 && strlen(strval($area)) <= 100) {
                $registerBed = new Database();
                $checkBedNr = new Database();
                $result = $checkBedNr->queryStatement("SELECT * FROM gardenBeds WHERE gardenId = ? AND bedNr = ?", [$this->gardenId, $bedNr]);
                if ($result->count() < 1) {
                    $registerBed->query("INSERT INTO gardenBeds (gardenId, bedNr, area) VALUES (?,?,?)", [$this->gardenId, $bedNr, $area]);
                    return 1;
                }
            }
        }

        return 0;
    }

    // Delete bed from DB
    public function deleteBed($data)
    {
        $bedNr = $data['bedNr'];

        $validate = new Vali();
        if ($validate->validateInt($bedNr) == 1 && strlen(strval($bedNr)) <= 4) {
            $deleteBed = new Database();
            $checkBedNr = new Database();
            $result = $checkBedNr->queryStatement("SELECT * FROM gardenBeds WHERE gardenId = ? AND bedNr = ?", [$this->gardenId, $bedNr]);
            if ($result->count() > 0) {
                $deleteBed->query("DELETE FROM gardenBeds WHERE gardenId = ? AND  bedNr = ?", [$this->gardenId, $bedNr]);

                return 1;
            }
        }

        return 0;
    }

    // Gets bed data from DB
    public function getBedContents($data)
    {
        $bedNr = $data['bedNr'];
        $bedContents = [];
        $getBedContents = new Database();
        $vegProductionResults = $getBedContents->queryStatement("SELECT * FROM vegProduction WHERE gardenId = ? AND bedNr = ?", [$this->gardenId, $bedNr])->results();
        foreach ($vegProductionResults as $result) {
            $variety = new Variety($result['vegDataId']);
            array_push($bedContents, $variety->getVarietyName());
        }

        return $bedContents;
    }
}