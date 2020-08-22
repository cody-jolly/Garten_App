<?php

namespace App\Controllers;

use App\Controllers\BaseController;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    // Render home
    public function index($params)
    {
        session_destroy();
        session_start();
        $this->view->render("home", $params);
    }
}