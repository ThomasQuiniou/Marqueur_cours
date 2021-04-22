<?php

namespace Controllers;


use Models\Marqueur;

class Home extends Controller {

    public function view() {
    $marqueur = null;
        if(is_granted('ROLE_USER')){
            $marqueurs = new Marqueur;
            $marqueurs->setId_user($_SESSION['id']);
            $marqueur = $marqueurs->findLessonMarqueurUserByUser();
        }


        return $this->render('home', [
            "marqueurs" => $marqueur
        ]);
    }
}
