<?php

namespace Controllers;

use Models\Lesson as ModelsLesson;

class Lesson extends Controller {
    public function show() {
        $lessons = new ModelsLesson();
        $lessons = $lessons->findAll();

        foreach($lessons as $lesson) {
            echo $lesson['name']. '<br>';
        }

    }

    public function insert(){
        
    }
}
