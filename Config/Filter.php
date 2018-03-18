<?php
namespace Config\Routes {

    use Config\Routes\Routes;

    $link       = $_SERVER['REQUEST_URI'];    
    $class      = null;
    $method     = null;
    $parameter  = null;

    /*
    * A função está tratando a url e atribuindo os valores para o objeto Routes
    * Chamar esta classe se o modulo de navegação for o modulo padrão
    */
    function FilterUrl( $request, $parameters, $routes, $class, $method ) {
        $routes::$_class = $class;
        if( $class == "home" ) :
            $routes::$_method = "index";
            $routes::$_parameter = 0;
        elseif( $class != "home" ) :
            if ( isset( $request[3] ) ) :
                if( $request[3] == "" || $request[3] == null ) :
                    $method = "index";
                    $routes::$_method = $method;
                    $routes::$_parameter = 0;
                else :
                    $method = $request[3];
                    if( $method == "new" ) :
                        $routes::$_method = $method;
                        $routes::$_parameter = 0;
                    elseif ( $method != "new" ) :
                        if( !isset( $request[4] ) ) :
                            $parameter = 0;
                        else :
                            if( $request[4] == "" || $request[4] == null ) :
                                $parameter = 0;
                            else:
                                $parameter = $request[4];
                            endif;
                        endif;
                    endif;
                    $routes::$_method = $method;
                    $routes::$_parameter = 0;
                endif;
            else:
                $method = "index";
                if( $method == "new" ) :
                    $routes::$_method = $method;
                    $routes::$_parameter = 0;
                elseif ( $method != "new" ) :
                    $routes::$_method = $method;
                    $routes::$_parameter = 0;
                endif;
            endif;
        endif;

        
    }

    $request = explode( "/", $link );
    $parameters = count( $request );

    if ( $request[2] != null || $request[2] != "" ) :
        $class = $request[2];
    else :
        $class = "home";
    endif;

    $routes = new Routes();

    FilterUrl( $request, $parameters, $routes, $class, $method );    

    Routes::Submit();
}