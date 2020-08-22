<?php


namespace App\Controllers\Src;


/**
 * Class ModalController
 * @package App\Controllers\Src
 */
class ModalController extends \App\Controllers\BaseController
{
    //Renders modal called with necessary data array
    public function index($params)
    {
        if ($params[0] == "garden-varieties") {
            $varietyArray = $this->garden->getVarieties();
            $this->view->renderPartial("modals", $params, $varietyArray);
        }

        // Calculate vegProduction data upon completion of update process, render update-complete
        if ($params[0] == "welcome" || $params[0] == "update-complete") {
            $this->garden->calculateVegProduction();
            $user = $this->user->getUserData()['firstName'];
            $this->view->renderPartial("modals", $params, [$user]);
        }

        if ($params[0] == "profile") {
            $userData = $this->user->getUserData();
            $userCity = $this->user->getUserCity();
            $this->view->renderPartial("modals", $params, [$userData, $userCity]);
        }

        if ($params[0] == "garden-profile") {
            $data = $this->garden->getGardenProfileData();
            $varietyArray = $this->garden->getVarieties();
            $this->view->renderPartial("modals", $params, [$data, $varietyArray]);
        }

        $this->view->renderPartial("modals", $params);
    }
}