<?php

namespace Controllers;

use Models\Lesson as ModelsLesson;
use Models\Marqueur as ModelsMarqueur;

class Lesson extends Controller {
    public function show() {
        $this->isGranted('ROLE_USER');
        $lessons = new ModelsLesson();

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $this->isGranted('ROLE_ADMIN');

            $lessons->setHeure_depart(date("Y-m-d H:i:s"));
            $lessons->setName(htmlspecialchars($_POST['name']));
            $lessons->insert();

            header('location: index.php?controller=lesson&task=view&param='.$lessons->getId());
        }
        return $this->render('lesson/show', [
            'lessons' => $lessons->findAll()
        ]);

    }
    public function view($id){
        $this->isGranted('ROLE_USER');
        $lessons = new ModelsLesson();
        $marqueur = new Marqueur();
        $marqueurMoel = new ModelsMarqueur();

        $lessons->findById($id);
        if($lessons->getTime_end() === null ){
            $marqueur->add($lessons->getId());
        }


        // if(isset($_POST['valid']) && $lessons->getHeure_depart() === NULL ) {
        //     $this->isGranted('ROLE_ADMIN');
        //     $lessons->setHeure_depart(date("Y-m-d H:i:s"));
        //     $lessons->update();

        //     header('location: index.php?controller=lesson&task=view&param='.$lessons->getId());

        // }

        if(isset($_POST['stopLesson'])){
        $this->isGranted('ROLE_ADMIN');
        $lessons->setTime_end(date("Y-m-d H:i:s"));
        $lessons->update();

        header('location: index.php?controller=lesson&task=view&param='.$lessons->getId());

        }
        $marqueurMoel->setId_lesson($lessons->getId());

        return $this->render('lesson/view', [
           'id' => $lessons->getId(),
           'name' => $lessons->getName(),
           'time' => $lessons->getHeure_depart(),
           'marqueurs' => $marqueurMoel->findLessonMarqueurUserByLesson(),
           'time_end' => $lessons->getTime_end()
        ]);

    }

}
