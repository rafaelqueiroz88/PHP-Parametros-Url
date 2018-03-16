<?php
namespace Config\Routes {
    use PDO;
    use PDOExceptions;
    
    class Paths {

        private static $database = null;
        private static $query = null;

        public function __construct( $class, $method, $parameter, $connection ) {

            $checker = "App/Controllers/" . ucfirst($class) . ".php";
            $condition = false;
            if(file_exists($checker)):
                $condition = true;
            endif;
            if($condition == true) :
                self::$database = $connection;
                switch( $method ) {
                    case "index":
                        self::Index( $class, $method, $parameter );
                        break;
                    case "new":
                        self::New( $class, $method, $parameter );
                        break;
                    case "show":
                        self::Show( $class, $method, $parameter );
                        break;
                    case "edit":
                        self::Edit( $class, $method, $parameter );
                        break;
                    case "delete":
                        self::Delete( $class, $method, $parameter );
                        break;
                }
            else:
                self::SendFailNotification();
            endif;
        }

        public static function Index( $class, $method, $parameter ) {
            
            self::ImportMVC( $class, $method, $parameter );
        }

        public static function New( $class, $method, $parameter ) {
            
            self::ImportMVC( $class, $method, $parameter );            
            // Uncomment it if necessary
            self::$database::ExecuteString( $class, $method, self::$query, $parameter );

        }

        public static function Show( $class, $method, $parameter ) {
            
            self::ImportMVC( $class, $method, $parameter );
            // Uncomment it if necessary
            self::$database::ExecuteString( $class, $method, self::$query, $parameter );

        }

        public static function Edit( $class, $method, $parameter ) {
            
            self::ImportMVC( $class, $method, $parameter );
            // Uncomment it if necessary
            self::$database::ExecuteString( $class, $method, self::$query, $parameter );

        }

        public static function Delete( $class, $method, $parameter ) {
            
            self::ImportMVC( $class, $method, $parameter );
            // Uncomment it if necessary
            self::$database::ExecuteString( $class, $method, self::$query, $parameter );

        }

        public static function ImportMVC( $class, $method, $parameter ) {

            include "App/Models/" . ucfirst( $class ) . ".php";
            include "App/Controllers/" . ucfirst( $class ) . ".php";
            include "Resources/Pages/" . ucfirst( $class ) . "/" . ucfirst( $method ) . ".php";
            
        }

        public static function SendFailNotification() {
            echo "Página não encontrada";
        }
    }
}