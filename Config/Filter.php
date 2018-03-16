<?php
namespace Config\Routes {
    use Config\Routes\Routes;
    $link = $_SERVER['REQUEST_URI'];    
    $request = explode( "/", $link );
    $parameters = count( $request );
    $class = null;
    $method = null;
    $parameter = null;
    if ( $request[2] != null || $request[2] != "" ) :
        $class = $request[2];
    else :
        $class = "home";
    endif;    
    $routes = new Routes();
    filterUrl( $request, $parameters, $routes, $class );
    function filterUrl( $request, $parameters, $routes, $class ) {
        if( $parameters == 3 ) :
            if ( $class == "home" ) :
                /*$method = $request[3];
                $routes::$_class_name = $class;
                $routes::$_class_address = $class;
                $routes::$_method = $method;
                $routes::$_parameter = $parameter;*/
                //Routes::add(); //Passar apenas uma vez no final
            elseif( $request[3] == "new" ) :
                /*$method = $request[3];
                $routes::$_class_name = $class;
                $routes::$_class_address = $class;
                $routes::$_method = $method;
                $routes::$_parameter = $parameter;*/
                //Routes::add(); //Passar apenas uma vez no final
            endif;
        elseif( $parameters > 3 && ( $request[3] != null || $request[3] != "" ) ) :
            if( isset( $request[3] ) ) :
                if( isset( $request[4] ) ) :
                    if( $request[4] == null || $request[4] == "" ) :
                        echo "Faltam parametros para a função " . $request[3];
                    else :
                        /*
                        $method = $request[3];
                        $parameter = $request[4];

                        $routes::$_class_name = $class;
                        $routes::$_class_address = $class;
                        $routes::$_method = $method;
                        $routes::$_parameter = $parameter;
                        */
                        //Routes::add(); //Passar apenas uma vez no final
                    endif;
                else :
                    echo "Faltam parametros para a função " . $request[3];
                endif;
            else :
                //Routes::add(); //Passar apenas uma vez no final
            endif;
        endif;
    }
    Routes::add(); // "/" . $class, $class, "index", "0" <- passar estes atributos tratados nas classes acima
    Routes::submit();
}