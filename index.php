<?php
session_start();
include "Config/Database.php";
include "App/Helpers/Constructor.php";
use App\Helper\Render;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            <?php Render::PageName(); ?>
        </title>
        <link rel="stylesheet" href="Resources/Assets/css/bootstrap.css">
        <link rel="stylesheet" href="Resources/Assets/css/style.scss">
    </head>
    <body>
        
        <?php Render::Header(); ?>

        <?php Render::Body(); ?>

        <?php Render::Footer(); ?>

        <script src="Resources/Assets/js/jquery-3.2.1.js"></script>        
        <script src="Resources/Assets/js/bootstrap.js"></script>
    </body>
</html>