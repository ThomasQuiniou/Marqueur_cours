<?php

namespace Controllers;

use Models\Marqueur as ModelsMarqueur;

class Marqueur extends Controller {
    public function add($idlesson) {
        if(isset($_POST['validMarqueur'])){
            $marqueurs = new ModelsMarqueur();

            $marqueurs->setId_lesson($idlesson);
            $marqueurs->setId_user($_SESSION['id']);
            $marqueurs->setMarqueur_time(date("Y-m-d H:i:s"));

            $marqueurs->insert();

            header('location: index.php?controller=marqueur&task=addContent&param=' .$marqueurs->getId());
        }
    }

    public function addContent($id) {
        if(isset($_POST['validContent']) && isset($_POST['content']) && !empty($_POST['content']) ){
            $marqueurs = new ModelsMarqueur();

            $marqueurs->setId($id);
            $marqueurs->setContent(htmlspecialchars($_POST['content']));

            $marqueurs->update();

            $marqueurs->findById($id);

            header('location: index.php?controller=lesson&task=view&param='.$marqueurs->getId_lesson());
        }
    $this->render('marqueur/formContent');
    }
}
