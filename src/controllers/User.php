<?php 
namespace Controllers;

use Models\User as ModelsUser;

class User extends Controller {
    public function inscription() {

        if (
            isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) &&  isset($_POST['emailConfirm']) && isset($_POST['password']) && isset($_POST['passwordConfirm']) &&  
            !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['emailConfirm']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])
        ) {
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $email = htmlspecialchars($_POST['email']);
            $emailConfirm = htmlspecialchars($_POST['emailConfirm']);
            $password = htmlspecialchars($_POST['password']);
            $passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);
            $error = false;
            $errors = [];
            if ($email !== $emailConfirm) {
                $error = true;
                array_push($errors, 'Vos e-mails ne correspondent pas !');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = true;
                array_push($errors, 'Vos e-mails n\'est pas conforme !');
            }
            if ($password !== $passwordConfirm) {
                $error = true;
                array_push($errors, 'Vos mots de passe ne correspondent pas !');
            }

            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialchars = preg_match('@[^\w]@', $password);

            if ( !$uppercase && !$lowercase && !$number && !$specialchars && strlen($password) < 8 ){
                $error = true;
                array_push($errors, 'Votre mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial !');

            }

            if ($error) {
                return $this->render('inscription' , [
                    'errors' => $errors
                ]);

            }
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);


            $user = new ModelsUser();
            $user->setName($name);
            $user->setFirstname($firstname);
            $user->setEmail($email);
            $user->setPassword($passwordHash);
            $user->push();

            header('location: index.php');
        }
        echo"pasok";
        return $this->render('inscription');
    }

    public function connexion() {
        if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
        {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $userModel = new ModelsUser();
            $user = $userModel->findAllByEmail($email);
            if(!$user){
                return $this->render('connexion', [
                    'error' => 'Votre e-mail ou votre mot de passe est incorrect'
                ]);
            }
            if(password_verify($password, $user['password'])){
                session_start();
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['id'] = $user['id'];

                header('location: index.php');
            }
        }   
        
        return $this->render('connexion');
    }

    public function deconnexion( ){
        session_start();
        if (!empty($_SESSION['id'])){
            $_SESSION = [];
            session_destroy();

            header('location: index.php');
        }
    }
}
