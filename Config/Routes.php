<?php
namespace Config\Routes {
    use Config\DatabaseConnector\Database;
    class Routes {
        public static $_class = null;
        public static $_method = null;
        public static $_parameter = null;

        public static function Submit() {
            include "Paths.php";
            $database = new Database();
            new Paths( self::$_class, self::$_method, self::$_parameter, $database );
        }
    }
}