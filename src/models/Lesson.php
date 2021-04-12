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
        $req = $this->pdo->query('SELECT * FROM lesson');
        $req->execute();

        $i = 0;
        while($lessons = $req->fetch()) {
            $i++;
            $lesson[$i]['id'] = $lessons['id'];
            $lesson[$i]['name'] = $lessons['name'];
            $lesson[$i]['heure_depart'] = $lessons['heure_depart'];
        }
        return $lesson;
    }
}
