<?php


namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\SessionController;

/**
 * Class DashboardController
 * @package App\Controllers
 */
class DashboardController extends SessionController
{
    // Render dashboard with, without further registration as needed
    public function index($params)
    {
        if ($this->garden->checkGardenReg()) {
            $this->view->render("dashboard", ["gardenReg" => "regComplete",
                                                    "user" => $this->user->getUserData()['firstName'],
                                                    "city" => $this->user->getUserCity()
                                                    ]);
        } else {
            $this->view->render("dashboard", ["gardenReg" => "newGardenReg"]);
        }
    }
}