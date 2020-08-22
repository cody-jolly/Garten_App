<?php
## Adapted from MVC Tutorium with Philip Braunen

namespace App\Core;

use App\Models\Database;
use App\Models\Variety;

/**
 * Class View
 * @package App\Core
 */
// Renders views with applicable parameters as called by controllers
class View
{
    private $rootpath = "http://localhost/Garten_App/public/";

    // Renders requested view with applicable data variables
    public function render($view, array $data = [])
    {
        $rootpath = $this->rootpath;

        require_once ("../app/Views/partials/header.php");
        require_once ("../app/Views/modules/" . $view . ".php");
        require_once ("../app/Views/partials/footer.php");

        exit;
    }

    // Renders requested partial view with applicable data variables
    public function renderPartial($path, array $params = [], array $data = [])
    {
        require_once ("../app/Views/partials/" . $path . "/" . $params[0] . ".php");

        exit;
    }
}