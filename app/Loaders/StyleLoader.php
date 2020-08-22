<?php

namespace App\Loaders;


/**
 * Class StyleLoader
 * @package App\Loaders
 */
// Loads link tags to stylesheets html <head>
class StyleLoader
{
    private $styleSheets = ['bootstrap/css/bootstrap.min.css', 'https://use.typekit.net/vae6qtf.css', 'css/style.css'];

    public function __construct($rootpath)
    {
        foreach ($this->styleSheets as $styleSheet) {
            if (strpos($styleSheet, 'http') === false) {
                echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $rootpath . $styleSheet . "\">";
            } else {
                echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$styleSheet}\">";
            }
        }
    }
}