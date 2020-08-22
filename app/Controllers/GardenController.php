<?php


namespace App\Controllers;

/**
 * Class GardenController
 * @package App\Controllers
 */
class GardenController extends BaseController
{
    // Call method on Garden model with given parameters from javascript ajax request
    public function index($params)
    {
        $method = htmlspecialchars($_POST['func']);
        $data = array_map('htmlspecialchars', $_POST);
        $feedback = $this->garden->$method($data);
        echo $feedback;
    }
}