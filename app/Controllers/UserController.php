<?php

namespace App\Controllers;

use App\Db\Database;
use App\Entity\User;
use PDO;

class UserController implements ControllerInterface
{
    public static function view(): void
    {
        $title = 'Criar Usuário';
        include_once __DIR__ . '/../Views/Users/register.view.php';
    }


    public static function list(): void
    {
        $db = new Database('users');

        $users = [];
        // verifica se o find existe ou não
        if (isset($_GET['find']) && !empty($_GET['find'])) {
            $all = $db->selectByName($_GET['find']);
        } else {
            $all = $db->select();
        }
        
        $users = $all->fetchAll(PDO::FETCH_ASSOC);

        include_once __DIR__ . '/../Views/Users/list.view.php';
    }

    public static function register(): void
    {
        if (!isset($_POST['name'], $_POST['email'], $_POST['password'])) 
        {
            header('Location: /user');
            die;
        }
        
        // cria um novo objeto User e atribui os valores
        $userData = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        // cria um novo usuário
        $obUser = User::make($userData);

        // salva o novo usuário no banco de dados
        $obUser->registrar();

        header('location: /user/list');
        exit;
    }

    /**
     * login
     * entra na conta
     */
    public static function login(): void
    {
        if (!isset($_POST['email'], $_POST['password'])) {
            header('Location: /user/list');
            exit;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::getEmail($email);

        if ($user && password_verify($password, $user->password)) {
            // Autenticação bem-sucedida
            session_start();
            $_SESSION['user_id'] = $user->id;
            header('Location: /');
            exit;
        } else {
            // Autenticação falhou
            echo "Login failed. Please check your credentials.";
            exit;
        }
    }

     /**
      * autentica login
      */

    /**
     * sai da conta
     */
    public static function logout(): void 
    {
        session_unset();
        session_destroy();
        include_once __DIR__ . '/../Views/Users/logout.view.php';
        exit();
    }
}