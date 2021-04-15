<?php

namespace Controllers;

class Home extends Controller {
    public function view() {
        //session_start();
        return $this->render('home');
    }
}
