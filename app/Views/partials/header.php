<?php
use App\Loaders\JSLoader;
use App\Loaders\StyleLoader;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?= ucfirst($view) ?></title>
    <?php
    $styleLoader = new StyleLoader($rootpath);
    $JSLoader = new JSLoader($rootpath);
    ?>
    <script>
        window.rootpath = '<?= $rootpath ?>';
    </script>
</head>
<body class="position-relative no-gutters container-fluid px-0">