<?php

namespace App\Controllers;

use App\Controllers\BaseController;

/**
 * Class UserController
 * @package App\Controllers
 */
class UserController extends BaseController
{
    // Call method on User model with given parameters from javascript ajax request
    public function index($params)
    {
        $method = htmlspecialchars($_POST['func']);
        $data = array_map('htmlspecialchars', $_POST);
        $feedback = $this->user->$method($data);
        echo $feedback;
    }
}