<?php

namespace Controllers;

class Marqueur extends Controller {
    public function view() {
        session_start();
        return $this->render('marqueur');
    }
}
