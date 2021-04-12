<?php

namespace Application;

class Application
{
    public static function process()
    {
        $controllerName = "Home";
        $task = "view";
        $param = null;

        if(!empty($_GET['controller'])) {
            $controllerName = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['task'])) {
            $task = $_GET['task'];
        }
        if(!empty($_GET['param'])) {
            $param = $_GET['param'];
        }

        $controllerName = "\Controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task($param);
        
    }
}