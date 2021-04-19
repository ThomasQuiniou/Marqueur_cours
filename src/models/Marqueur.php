<?php 

namespace Models;

class Marqueur extends Model {
    private $id;
    private $id_user;
    private $id_lesson;
    private $marqueur_time;
    private $content;
    

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

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
    public function insert(){
        $time = $this->getMarqueur_time();
        $user = $this->getId_user();
        $lesson = $this->getId_lesson();
        $content = null;
        $marqueurs = $this->pdo->prepare('INSERT INTO marqueur SET id_user = :user, id_lesson = :lesson, marqueur_time = :time, content = :content');
        $marqueurs->execute([
            'user' => $user,
            'lesson' => $lesson,
            'time' => $time,
            'content' => $content
        ]);
        $this->setId($this->pdo->lastInsertId());
    }
    public function update() {
        $id = $this->getId();
        $content = $this->getContent();
        $marqueurs = $this->pdo->prepare('UPDATE marqueur SET content = :content WHERE id = :id');
        $marqueurs->execute([
            'content' => $content,
            'id' => $id
        ]);
    }
    public function findByLesson(){
        $lesson = $this->getId_lesson();
        $marqueurs = $this->pdo->prepare('SELECT * FROM marqueur WHERE id_lesson = :lesson');
        $marqueurs->execute([
            'lesson' => $lesson]);
        return $marqueurs->fetchAll();
    }
    public function findById(){
        $id = $this->getId();

        $marqueurs = $this->pdo->prepare('SELECT * FROM marqueur WHERE id = :id');
        $marqueurs->execute(['id' => $id]);
        $marqueur =  $marqueurs->fetch();
        $this->setId_lesson($marqueur['id_lesson']);
        $this->setId_user($marqueur['id_user']);
        $this->setContent($marqueur['content']);

    }
    public function findLessonMarqueurUserByLesson(){
        $lesson = $this->getId_lesson();

        $marqueurs = $this->pdo->prepare('SELECT user.name as name_user, firstname, marqueur_time, marqueur.id, content, heure_depart
                                        FROM marqueur
                                        INNER JOIN user 
                                        ON marqueur.id_user =  user.id 
                                        INNER JOIN lesson
                                        ON marqueur.id_lesson = lesson.id
                                        WHERE marqueur.id_lesson = :lesson
                                        AND marqueur.content != "" 
                                        ORDER BY marqueur_time DESC');
    
    $marqueurs->execute([
        'lesson' => $lesson]);
        return $marqueurs->fetchAll();
    }

}