<?php
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
    </head>
    <body>
        
        <?php Render::Header(); ?>

        <?php Render::Body(); ?>

        <?php Render::Footer(); ?>

    </body>
</html>