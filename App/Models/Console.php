<?php
namespace App\Models {
    use PDO;
    use PDOException;
    class Console {

        private static $conn;

        public function __construct( $_db ) {
            self::$conn = $_db;
        }
        
        public static function ListControllers() {
            $controllers = "App/Controllers";
            $files = scandir( $controllers );
            $file_count = count( $files );
            for( $i = 2; $i < $file_count; $i++ ) {
                if( $files[$i] != "Console.php" ) :
                    echo "<li>" . $files[$i] . "</li>";
                endif;
            }
        }

        public static function ListModels() {
            $models = "App/Models";
            $files = scandir( $models );
            $file_count = count( $files );
            for( $i = 2; $i < $file_count; $i++ ) {
                if( $files[$i] != "Console.php" ) :
                    echo "<li>" . $files[$i] . "</li>";
                endif;
            }
        }

        public static function ListViews() {
            $views = "Resources/Pages";
            $files = scandir( $views );
            $file_count = count( $files );
            for( $i = 2; $i < $file_count; $i++ ) {
                if( $files[$i] != "Console" ) :
                    if( $files[$i] != "_Layouts" ) :
                        echo "<li>" . $files[$i] . "</li>";
                    endif;
                endif;
            }
        }

        public static function ListDBTables() {
            $query = "SHOW TABLES FROM dominostore";
            $stmt = self::$conn->prepare( $query );
            $stmt->execute();
            while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
                extract( $row );
                $tabela = $row["Tables_in_dominostore"];
                echo "<li>";
                echo $row["Tables_in_dominostore"];
                echo "<ul>";
                $query = "SHOW COLUMNS FROM $tabela";
                $stmt = self::$conn->prepare( $query );
                $stmt->execute();
                while ( $sub_row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
                    extract( $sub_row );
                    echo "<li>";
                    echo $sub_row["Field"];
                    echo "</li>";
                }
                echo "</ul>";
                echo "</li>";
            }
        }

    }
}