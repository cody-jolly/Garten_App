<?php

namespace App\Loaders;


/**
 * Class JSLoader
 * @package App\Loaders
 */
// Loads script tags in html <head>
class JSLoader
{
    private $scripts = ['js/jquery.js', 'bootstrap/js/bootstrap.min.js', 'js/modals.js'];

    public function __construct($rootpath)
    {
        foreach ($this->scripts as $script) {
            if (strpos($script, 'http') === false) {
                echo "<script type=\"text/javascript\" src=\"" . $rootpath . $script . "\"></script>";
            } else {
                echo "<script type=\"text/javascript\" src=\"{$script}\"></script>";
            }
        }
    }
}