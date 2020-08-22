<?php


namespace App\Controllers;

use App\Controllers\BaseController;

/**
 * Class UeberController
 * @package App\Controllers
 */
class UeberController extends BaseController
{
    // Render ueber-uns
    public function index($params)
    {
        session_destroy();
        session_start();
        $this->view->render("ueber-uns", $params);
    }
}