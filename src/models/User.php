<?php

namespace Models;

class User extends Model {
    private $id;
    private $name;
    private $firstname;
    private $email;
    private $password;
    

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
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    //Sert a inserer un nouveau utilisateur

    public function push() {
        $insertUser = $this->pdo->prepare('INSERT INTO user SET name = :name, firstname = :firstname, email = :email, password = :password');
        $insertUser->execute([
            'name' => $this->getName(),
            'firstname' => $this->getFirstname(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ]);
    }

    /* public function emailExist($email){
        $req = this->pdo->prepare('SELECT email FROM user WHERE email = :email')
    } */

    public function findAllByEmail($email){
        $req = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');
        $req->execute(['email' => $email ]);

        return $req->fetch();
    }
}


