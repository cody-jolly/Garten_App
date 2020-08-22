<?php


namespace App\Controllers;


/**
 * Class DatenschutzController
 * @package App\Controllers
 */
class DatenschutzController extends BaseController
{
    // Render datenschutz
    public function index($params)
    {
        $this->view->render("datenschutz", $params);
    }
}