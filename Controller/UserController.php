<?php 
namespace Controller;


class UserController extends BaseController{

    function ShowUserList(){
        $userList = $this->userManager->getAll();
        $this->addParam('users', $userList);
        $this->View('userList');
    }

    function ShowUser($id)
    {
        $user = $this->userManager->getById($id);
        if ($user) 
        {
            var_dump($user);
        }
        else
        {
            echo 'Utilisateur non trouvé';
        }
    }

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

    function DeleteUser()
    {
        if ($this->userManager->delete("3")) {
            echo "Utilisateur supprimé !";
        }
    }

    function SignInForm()
    {
        $this->View("signin");
    }

    function SignIn($mail, $password) {
        $user = new \stdClass();
        $user->mail = $mail;
        $user->password = password_hash($password,PASSWORD_DEFAULT);
        $user->pseudo = "test";
        if ($this->userManager->create($user)) {
            echo "Utilisateur créé !";
        }
    }

    function LoginForm()
    {
        $this->View("login");
    }

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
