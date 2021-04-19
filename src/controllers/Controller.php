<?php 

namespace Controllers;

class Controller{
    protected function render(string $path, array $variables = []){
        extract($variables);
        ob_start();
        require('views/templates/'. $path . '.html.php');
        $content = ob_get_clean();
        require('views/layout.html.php');
        exit;
    }

    protected function isGranted($role){
        if(!is_granted($role)){
            header('location: index.php');
        }
    }
}