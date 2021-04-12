<?php

namespace Models;

use Database\Database;

class Model {
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::pdo();
    }
}