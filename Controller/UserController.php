<?php 
namespace Controller;

class UserController extends BaseController{

    // Fonction pour créer un utilisateur
    function CreateUser()
    {
        $user = new \stdClass();
        $user->mail = "test@test.fr";
        $user->password = password_hash("imverysecure",PASSWORD_DEFAULT);
        $user->pseudo = "test";
        if ($this->userManager->create($user)) {
            echo "Utilisateur créé !";
        }
    }

    // Fonction pour update un utilisateur
    function CreateUser()
    {
        $user = new \stdClass();
        $user->mail = "test@test.fr";
        $user->password = password_hash("imverysecure",PASSWORD_DEFAULT);
        $user->pseudo = "test";
        if ($this->userManager->create($user)) {
            echo "Utilisateur créé !";
        }
    }

    // Fonction pour supprimer un utilisateur
    function DeleteUser()
    {
        if ($this->userManager->delete("3")) {
            echo "Utilisateur supprimé !";
        }
    }

    // Fonction pour update un utilisateur
    function UpdateUser()
    {
        $user = new \stdClass();
        $user->id = 3;
        $user->mail = "test2@test2.fr";
        $user->password = password_hash("imverysecure",PASSWORD_DEFAULT);
        $user->pseudo = "test2";
        if ($this->userManager->update($user)) {
            echo "Utilisateur modifié !";
        }
    }
    // Fonction pour avoir le formulaire d'inscription
    function SigninForm(){
        $this->View("signin");
    }

    // Fonction pour connecter un utilisateur
    function SignIn($email, $password)
    {
        var_dump($email, $password);
    }

    // Fonction pour afficher le formulaire de login
    function LoginForm()
    {
        $this->View("login");
    }

    // Fonction pour connecter un utilisateur
    function Login($mail, $password)
    {
        $user = $this->userManager->getByEmail($mail);
        if($user){
           if (password_verify($password,$user->password)){
              unset($user->password);
              $_SESSION['user']=$user;
           }else{
            echo "Mot de passe érroné";
            $this->View("login");
           }
        }else{
            echo "Email incorrect";
            $this->View("login");
        }

    }
}