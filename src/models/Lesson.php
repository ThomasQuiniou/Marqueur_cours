<?php 

namespace Models;

class Lesson extends Model {
    private $id;
    private $name;
    private $heure_depart;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of heure_depart
     */ 
    public function getHeure_depart()
    {
        return $this->heure_depart;
    }

    /**
     * Set the value of heure_depart
     *
     * @return  self
     */ 
    public function setHeure_depart($heure_depart)
    {
        $this->heure_depart = $heure_depart;

        return $this;
    }

    public function findAll() {
        $lessons = $this->pdo->query('SELECT * FROM lesson');

        return $lessons->fetchAll();
    }
    public function findById($id) {
        $lessons = $this->pdo->prepare('SELECT * FROM lesson WHERE id = :id');
        $lessons->execute([
            'id' => $id
        ]);
        $lesson = $lessons->fetch();

        $this->setName($lesson['name']);
        $this->setId($lesson['id']);
        $this->setHeure_depart($lesson['heure_depart']);
    }

    public function insert(){
        $name = $this->getName();
        $time = $this->getHeure_depart();
        if(!$time){
            $time = null;
        }
        $lesson = $this->pdo->prepare('INSERT INTO lesson SET name = :name, heure_depart = :time');
        $lesson->execute([
            'name' => $name,
            'time' => $time
        ]);
        //recuperer le dernier id de l'insertion'
        $id = $this->pdo->lastInsertId();

        $this->setId($id);
    }

    public function update() {

        $id = $this->getId();
        $name = $this->getName();
        $time = $this->getHeure_depart();

        $lesson = $this->pdo->prepare('UPDATE lesson SET name = :name, heure_depart = :time WHERE id = :id');
        $lesson->execute([
            'name' => $name,
            'time' => $time,
            'id' => $id
        ]);

    }
    
}
