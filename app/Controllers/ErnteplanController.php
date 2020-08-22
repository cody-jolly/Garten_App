<?php


namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\SessionController;

/**
 * Class ErnteplanController
 * @package App\Controllers
 */
class ErnteplanController extends SessionController
{
    // Render ernteplan
    public function index($params)
    {
        $this->view->render("ernteplan", $params);
    }
}