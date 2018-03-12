<?php
namespace Config\Routes
{
    use Config\DatabaseConnector\Database;
    class Routes
    {
        private static $_class_address = null;
        private static $_class_name = null;
        private static $_method = null;
        private static $_parameter = null;
        
        public static function add($class_address, $class_name, $method, $parameter)
        {
            self::$_class_address = $class_address;
            self::$_class_name = $class_name;
            self::$_method = $method;
            self::$_parameter = $parameter;
        }
        public static function submit()
        {
            include "Paths.php";
            $db = new Database();
            new paths( self::$_class_address, self::$_class_name, self::$_method, self::$_parameter, $db );
        }
    }
}