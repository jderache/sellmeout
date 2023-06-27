<?php 
namespace Controller;


class UserController extends BaseController{

    function ShowUserList(){
        $userList = $this->userManager->getAll();
        $this->compact(['users' => $userList]);
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
    
    function SignIn($mail, $password, $role) {
        try {
            $user = new \stdClass();
            $user->mail = $mail;
            
            // Vérification du mot de passe conforme
            if (!$this->isValidPassword($password)) {
                throw new \Exception("Le mot de passe doit respecter certains critères.");
            }
            
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->pseudo = $mail;
            $user->role = $role;
            
            if ($this->userManager->create($user)) {
                header("Location: /login");
            }
        } catch (\Exception $e) {
            // Gestion des erreurs
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }

    function isValidPassword($password) {
        // Expression régulière pour vérifier les critères du mot de passe
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        return preg_match($pattern, $password);
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
              header("location: /products");
           }else{
            echo "Mot de passe érroné";
            $this->View("login");
           }
        }else{
            echo "Email incorrect";
            $this->View("login");
        }

    }

    function Logout()
    {
        session_unset();
        session_destroy();
        header("Location: /login");
    }
}
