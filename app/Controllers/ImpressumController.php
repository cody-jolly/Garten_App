<?php


namespace App\Controllers;


/**
 * Class ImpressumController
 * @package App\Controllers
 */
class ImpressumController extends BaseController
{
    // Render impressum
    public function index($params)
    {
        $this->view->render("impressum", $params);
    }
}