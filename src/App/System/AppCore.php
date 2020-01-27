<?php
namespace App\System;

use App\Config\Config;

/**
 * Class AppCore
 */
class AppCore extends Config
{

    /**
     * AppCore constructor.
     */
    public function __construct()
    { 
        $routes = Config::ROUTES;
        $baseUrl = Config::BASE_URL;

        //get the request method
        $this->method = $_SERVER['REQUEST_METHOD'];

        if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) {
            if ($_SERVER['HTTP_X_HTTP_METHOD'] != 'DELETE' || $_SERVER['HTTP_X_HTTP_METHOD'] != 'PUT') {
                throw new Exception("Unexpected Header");
            }
        }
       
        $path = trim($_SERVER['REQUEST_URI'],'/');
 
        if (!array_key_exists($path, $routes)) {
            header("HTTP/1.1 " . $status[404] . " ");
            echo json_encode($status[404]);
            exit();
        }
        if ($routes[$path]['method'] != $_SERVER['REQUEST_METHOD']) {
            header("HTTP/1.1 " . $status[405] . " ");
            echo json_encode($status[405]);
            exit();
        }
 
            //Set the controller from request url
            $RequestObject = "App\\Controllers\\" . ucfirst(strtolower($routes[$path]['controller']));

            //Create object
            $controller = new $RequestObject();

            print_r($controller->tesfunction());
 
 

    }


}