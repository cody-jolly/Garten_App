<?php


namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\SessionController;

/**
 * Class AnbauplanController
 * @package App\Controllers
 */
class AnbauplanController extends SessionController
{
    //Render anbauplan view
    public function index($params)
    {
        $this->view->render("anbauplan", $params);
    }
}