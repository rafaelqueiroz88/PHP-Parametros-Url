<?php
namespace Config\Routes
{
    use PDO;
    use PDOExceptions;
    class Paths
    {
        private static $db = null;
        private static $query = null;
        public function __construct($class_address, $class_name, $method, $parameter, $db)
        {
            self::$db = $db;
            switch($method)
            {
                case "index":
                    self::Index($class_name);
                    break;
                case "new":
                    self::New($class_name, $method, $parameter);
                    break;
                case "show":
                    self::Show();
                    break;
                case "edit":
                    self::Edit();
                    break;
                case "delete":
                    self::Delete();
                    break;
            }            
        }
        public static function Index($class_name)
        {
            include "models/$class_name/$class_name.php";
            include "controllers/$class_name/$class_name.php";
            include "pages/$class_name/$class_name.php";
        }
        public static function New($class_name, $method, $parameter )
        {
            self::$query = array(
                0 => "Rafael",
                1 => "Castro",
                2 => "rafael.qdc88@gmail.com"
            );
            self::$db::ExecuteString( $class_name, $method, self::$query, $parameter );
        }
        public static function Show()
        {
            //your show file or controller here
        }
        public static function Edit()
        {
            //your edit file or controller here
        }
        public static function Delete()
        {
            //your delete file or controller here
        }
    }
}