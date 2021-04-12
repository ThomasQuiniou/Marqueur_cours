<?php 

namespace Models;

class Marqueur extends Model {
    private $id;
    private $id_user;
    private $id_lesson;
    private $marqueur_time;

    

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
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_lesson
     */ 
    public function getId_lesson()
    {
        return $this->id_lesson;
    }

    /**
     * Set the value of id_lesson
     *
     * @return  self
     */ 
    public function setId_lesson($id_lesson)
    {
        $this->id_lesson = $id_lesson;

        return $this;
    }

    /**
     * Get the value of marqueur_time
     */ 
    public function getMarqueur_time()
    {
        return $this->marqueur_time;
    }

    /**
     * Set the value of marqueur_time
     *
     * @return  self
     */ 
    public function setMarqueur_time($marqueur_time)
    {
        $this->marqueur_time = $marqueur_time;

        return $this;
    }
}