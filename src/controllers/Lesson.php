<?php

namespace Controllers;

use Models\Lesson as ModelsLesson;
use Models\Marqueur as ModelsMarqueur;

class Lesson extends Controller {
    public function show() {
        $lessons = new ModelsLesson();

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $lessons->setName(htmlspecialchars($_POST['name']));
            $lessons->insert();

            header('location: index.php?controller=lesson&task=view&param='.$lessons->getId());
        }
        return $this->render('lesson/show', [
            'lessons' => $lessons->findAll()
        ]);

    }
    public function view($id){
        $lessons = new ModelsLesson();
        $marqueur = new Marqueur();
        $marqueurMoel = new ModelsMarqueur();

        $lessons->findById($id);

        $marqueur->add($lessons->getId());


        if(isset($_POST['valid']) && $lessons->getHeure_depart() === NULL ) {

            $lessons->setHeure_depart(date("Y-m-d H:i:s"));
            $lessons->update();
            header('location: index.php?controller=lesson&task=view&param='.$lessons->getId());

        }
        $marqueurMoel->setId_lesson($lessons->getId());

        return $this->render('lesson/view', [
           'id' => $lessons->getId(),
           'name' => $lessons->getName(),
           'time' => $lessons->getHeure_depart(),
           'marqueurs' => $marqueurMoel->findByLesson()
        ]);

    }

}
