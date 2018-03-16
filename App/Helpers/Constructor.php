<?php
namespace App\Helper {
    class Render {
        public function __construct(){
            
        }
        public static function PageName() {
            echo "Route Sys. by Fafis";
        }
        public static function Header() {
            //Desenvolver função para verificar se esta logado, se sim, carregar um construtor diferente do visitante
            include "Resources/Pages/_Layouts/_shared.php";
        }
        public static function Body() {
            include "Config/Routes.php";
            include "Config/Filter.php";
        }
        public static function Footer () {
            include "Resources/Pages/_Layouts/_footer.php";
        }
    }
}