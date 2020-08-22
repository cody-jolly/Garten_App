<?php


namespace App\Controllers;

/**
 * Class BedController
 * @package App\Controllers
 */
class BedController extends BaseController
{
    // Call method on Bed model with given parameters from javascript ajax request
    public function index($params)
    {
        $method = htmlspecialchars($_POST['func']);
        $data = array_map('htmlspecialchars', $_POST);
        $feedback = $this->bed->$method($data);
        echo $feedback;
    }
}