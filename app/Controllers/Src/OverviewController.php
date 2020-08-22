<?php

namespace App\Controllers\Src;

use App\Models\Variety;
use App\Models\Weather;

/**
 * Class OverviewController
 * @package App\Controllers\Src
 */
class OverviewController extends \App\Controllers\BaseController
{
    //Renders overview called with necessary data array(s)
    public function index($params)
    {
        if($params[0] == "variety-overview") {
            $varieties = $this->garden->getGardenVarietes();
            $totalArea = [];
            $totalSowings = [];
            foreach ($varieties as $variety) {
                $totalArea[$variety->getVegDataId()] = round(($this->garden->getVarietyTotalArea($variety->getVegDataId()) / 10000), 2);
                $totalSowings[$variety->getVegDataId()] = $this->garden->getGardenVarietyTotalSowings($variety->getVegDataId());
            }
            $this->view->renderPartial("overviews", $params, [$varieties, $totalArea, $totalSowings]);
        }


        if($params[0] == "bed-overview") {
            $bedArray = $this->garden->getBeds();
            $contentArray = [];
            foreach ($bedArray as $bed) {
                $contents = $this->bed->getBedContents($bed);
                $contentArray[$bed['bedNr']] = $contents;
            }
            $this->view->renderPartial("overviews", $params, [$bedArray, $contentArray]);
        }

        if($params[0] == "production-overview") {
            $varietyNames = [];
            $productionPlan = $this->garden->getProductionPlan();
            foreach ($productionPlan as $set) {
                $variety = new Variety($set['vegDataId']);
                $varietyNames[$set['vegDataId']] = $variety->getVarietyName();
            }
            $this->view->renderPartial("overviews", $params, [$productionPlan, $varietyNames]);
        }

        if($params[0] == "harvest-overview") {
            $varietyNames = [];
            $varietyHarvestAreas = [];
            $harvestPlan = $this->garden->getHarvestPlan();
            foreach ($harvestPlan as $set) {
                $variety = new Variety($set['vegDataId']);
                $varietyNames[$set['vegDataId']] = $variety->getVarietyName();
                $varietyHarvestAreas[$set['vegDataId']] = round((($variety->getQcmPerServing() * $this->garden->getHouseholdSize()) / 10000), 2);
            }
            $this->view->renderPartial("overviews", $params, [$harvestPlan, $varietyNames, $varietyHarvestAreas]);
        }

        // Renders data from openweathermap.org api, or returns an error message if an exception occurs
        if($params[0] == "weather-overview") {
            if(isset($params[1])) {
                $newCity = ucfirst(htmlspecialchars($params[1]));
                $weather = new Weather($newCity);
                $weatherData = json_decode($weather->getWeatherData(), true);
            } else {
                $weather = new Weather();
                $weatherData = json_decode($weather->getWeatherData(), true);
            }
            if(isset($weatherData['exception'])) {
                echo "Wetterdata zu Ihrem Standort könnte nicht gefunden werden.";
                exit;
            }
            $this->view->renderPartial("overviews", $params, $weatherData);
        }

        $this->view->renderPartial("overviews", $params);
    }
}