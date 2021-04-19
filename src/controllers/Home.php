<?php

namespace Controllers;

use Models\Lesson;

class Home extends Controller {

    public function view() {
        $lessons = new Lesson();

        //session_start();
        return $this->render('home', [
            'lessons' => $lessons->findAll()
        ]);
    }
}
