<?php
namespace Config\Routes
{
    use Config\Routes\Routes;
    $link = $_SERVER['REQUEST_URI'];
    $request = explode("/", $link);
    $parameters = count($request);
    $class = $request[2];
    $method = null;
    $parameter = null;
    $routes = new Routes();
    filterUrl($request, $parameters, $routes, $class);

    function filterUrl($request, $parameters, $routes, $class)
    {
        if($request[3] == "new")
        {
            $method = $request[3];
            Routes::add("/" . $class, $class, $method, "0");
        }
        else if($parameters > 3 && ($request[3] != null || $request[3] != ""))
        {
            if(isset($request[3])){
                if(isset($request[4]))
                {
                    if($request[4] == null || $request[4] == ""){
                        echo "Faltam parametros para a função " . $request[3];
                    }
                    else
                    {
                        $method = $request[3];
                        $parameter = $request[4];
                        Routes::add("/" . $class, $class, $method, $parameter);
                    }
                }
                else
                {
                    echo "Faltam parametros para a função " . $request[3];
                }    
            }
        }
        else { Routes::add("/" . $class, $class, "index", "0"); }
    }    
    Routes::submit();
}