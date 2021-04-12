<?php

namespace Controllers;

use Models\Lesson as ModelsLesson;

class Lesson extends Controller {
    public function show() {
        $lessons = new ModelsLesson();
    }
}
