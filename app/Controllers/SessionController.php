<?php


namespace App\Controllers;


/**
 * Class SessionController
 * @package App\Controllers
 */
// Parent to all protected area controllers
class SessionController extends BaseController
{
    // Check if user is logged in, destroy session and render home if not
    public function __construct()
    {
        parent::__construct();
        if(!$this->user->sessionControl()) {
            session_destroy();
            session_start();
            $this->view->render('home');
        }
    }
}