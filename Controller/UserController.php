<?php

namespace Controller;


class UserController extends BaseController
{
    protected $userManager;
    protected $productManager;
    protected $orderManager;
    protected $orderItemsManager;

    function ShowUserList()
    {
        $userList = $this->userManager->getAll();
        $this->compact(['users' => $userList]);
        $this->View('userList');
    }

    function ShowUser($id)
    {
        $user = $this->userManager->getById($id);
        if ($user) {
            var_dump($user);
        } else {
            echo 'Utilisateur non trouvé';
        }
    }

    function CreateUser()
    {
        $user = new \stdClass();
        $user->mail = "test@test.fr";
        $user->password = password_hash("imverysecure", PASSWORD_DEFAULT);
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
        $user->password = password_hash("imverysecure", PASSWORD_DEFAULT);
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

    function LoginView($error = null)
    {
        if (isset($error)) {
            $this->compact([
                "error" => $error
            ]);
        }

        $this->view("login");
    }


    function SignIn($mail, $password, $role)
    {

        $user = new \stdClass();
        $user->mail = $mail;
        $user->pseudo = $mail;

        if (!(filter_var($mail, FILTER_VALIDATE_EMAIL))) {
            $this->compact([
                "error" => "Mail invalide !",
                "error_mail" => true,
            ]);
            $this->SignInForm();
            exit();
        }

        if ($this->userManager->getByEmail($mail)) {
            $this->compact([
                "error" => "Votre mail est déjà utilisé !<br>Veuillez en choisir un autre.",
            ]);

            $this->SignInForm();
            exit();
        }

        if (!(preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $password))) {
            $this->compact([
                "error" => "Votre mot de passe doit contenir au moins 8 caractères, une lettre majuscule,
                une lette minuscule, un chiffre et un caractère spécial"
            ]);

            $this->SignInForm();
            exit();
        }
        $user->role = $role;
        $user->password = password_hash($password, PASSWORD_DEFAULT);

        if ($this->userManager->create($user)) {
            header("location: /login");
            $this->compact(["success" => "Votre compte a bien été créé !<br>Vous pouvez maintenant vous connecter ci-dessous."]);
        } else {
            $this->compact(["error" => "Une erreur est survenue !"]);
            $this->SignInForm();
        }
    }

    function isValidPassword($password)
    {
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
        if ($user) {
            if (password_verify($password, $user->password)) {
                unset($user->password);
                $_SESSION['user'] = $user;
                header("location: /products");
            } else {
                $this->compact([
                    "error" => "Mot de passe erroné!"
                ]);
                $this->View("login");
            }
        } else {
            $this->compact([
                "error" => "E-mail incorrect !"
            ]);
            $this->View("login");
        }
    }

    function Logout()
    {
        session_unset();
        session_destroy();
        header("Location: /login");
    }

    function MyProducts()
    {
        $this->compact(["user"=> $_SESSION['user']]);

        switch ($_SESSION['user']->role) {
            case "buyer":

                break;
            case "seller":
                $listSellerProduct = $this->productManager->getAllSeller($_SESSION['user']->id);
                $this->compact(["listSellerProduct"=> $listSellerProduct]);
                break;
            case "admin":


                break;
        }

        $this->View("myProducts");
    }
    function Profile()
    {
        $this->compact(["user"=> $_SESSION['user']]);

        switch ($_SESSION['user']->role) {
            case "buyer":
                $orders = $this->orderManager->getByUserId($_SESSION['user']->id);
                    foreach($orders as $order) {
                    $order->products = $this->orderItemsManager->getItemsByCommandId($order->id);
                }
                $this->compact(["orders" => $orders]);
                break;
            case "seller":
                $orders = $this->orderManager->getBySellerId($_SESSION['user']->id);
                    foreach($orders as $order) {
                    $order->products = $this->orderItemsManager->getItemsByCommandId($order->id);
                }
                $this->compact(["orders" => $orders]);
                break;
            case "admin":


                break;
        }

        $this->View("profile");
    }
}
