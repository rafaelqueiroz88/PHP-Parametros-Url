<?php
namespace Config\DatabaseConnector {
    use PDO;
    use PDOException;
    class Database {
        
        public static $conn;
        public static $setup;
        public static $content;

        public static function GetSetUp() {
            $database_setup = file_get_contents("Database\Configuration.json");
            $json = json_decode($database_setup, true);

            $host       = $json["location"];
            $db_name    = $json["database"];
            $username   = $json["username"];
            $password   = $json["password"];

            $setup = Array(
                "location"      => $host,
                "database_name" => $db_name,
                "user"          => $username,
                "password"      => $password
            );
            
            return $setup;
        }

        public static function GetConnection() {
            self::$conn = null;
            self::$setup = self::GetSetUp();
            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$setup["location"] . ";
                    dbname=" . self::$setup["database_name"],self::$setup["user"], self::$setup["password"]);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $exception) {
                echo "Falha detectada: " . $exception->getMessage();
                die();
            }
            return Database::$conn;
        }

        /*
        * A variável $action é o a variável $method convertida
        * A variável $array é a variável $string convertida
        */        
        public static function ExecuteString( $class, $action, $array, $parameter ) {

            // Filtrar o tipo da ação para chamar a função adequada
            // Demais tratamentos do PDO aqui
            if( $class == "console" ) :
                self::ListAllTables();
            endif;

        }

        public static function Insert() {
            $query = "INSERT INTO $tbl (coluna1, coluna2, coluna3) VALUES (" . $array[0] . ", " . $array[1] . ", " . $array[2] . ")";
        }

        public static function Update() {
            $query = "UPDATE $tbl set firstname=" . $array[0] . ", lastname=" . $array[1] . ", email=" . $array[2]. " WHERE id=" . $array[3];
        }

        public static function Show() {
            $query = "SELECT * FROM $tbl WHERE id=" . $array[0];
        }

        public static function Select() {
            $query = "SELECT * FROM $tbl";
        }

        public static function Delete() {
            $query = "DELETE * ";
        }
        
    }
}