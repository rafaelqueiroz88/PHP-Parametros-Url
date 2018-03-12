<?php
namespace Config\DatabaseConnector
{
    use PDO;
    use PDOException;
    class Database
    {
               
        private static $host = "localhost";
        private static $db_name = "db_name";
        private static $username = "root";
        private static $password = "root_password";
        public static $conn;

        // public static function GetConnection()
        // {
        //     self::$conn = null;
        //     try
        //     {
        //         self::$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$db_name,self::$username,self::$password);
        //         self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     }
        //     catch(PDOException $exception)
        //     {
        //         echo "Falha detectada: " . $exception->getMessage();
        //         die();
        //     }
        //     return Database::$conn;
        // }

        public static function ExecuteString( $class_name, $action, $array, $parameter )
        {
            if($class_name == "admin")
            {
                $tbl = "usuarios";
                if($action == "new")
                {
                    $query = "INSERT INTO $tbl (firstname, lastname, email) VALUES (" . $array[0] . ", " . $array[1] . ", " . $array[2] . ")";
                }
                else if($action == "update")
                {
                    $query = "UPDATE $tbl set firstname=" . $array[0] . ", lastname=" . $array[1] . ", email=" . $array[2]. " WHERE id=" . $array[3];
                }
                else if($action == "select")
                {
                    $query = "SELECT * FROM $tbl WHERE id=" . $array[0];
                }
                else if($action == "select_multiple")
                {
                    $query = "SELECT * FROM $tbl";
                }
                else if($action == "delete")
                {
                    $query = "DELETE ";
                }
            }
        }
    }
}