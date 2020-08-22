<?php


namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Garden;
use App\Models\Bed;
use App\Models\Variety;

/**
 * Class BaseController
 * @package App\Controllers
 */

//Parent for all other controllers with needed models/core for functionality
class BaseController
{
    protected $view;
    protected $user;
    protected $garden;
    protected $bed;

    public function __construct()
    {
        $this->view = new View();
        $this->user = new User();
        $this->garden = new Garden();
        $this->bed = new Bed();
    }
}