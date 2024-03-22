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
        include_once __DIR__ . '/../Views/Users/create.view.php';
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

    public static function create(): void
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
        $obUser->cadastrar();

        header('location: /user/list');
        exit;
    }

    /**
     * edita um user
     */
    public static function edit($id): void
    {   
        $obUser = User::getUser($id);
        
        // valida user
        if (!$obUser) {
            header('location: /user/list'); 
            exit();
        }
        
        // valida post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $obUser->name = $_POST['name'];
            $obUser->email = $_POST['email'];
            $obUser->password = $_POST['password'];
            $updateResult = $obUser->atualizar();
            
            if ($updateResult) {
                // redireciona após a atualização bem-sucedida
                header('location: /user/list');
                exit();
            } else {
                // tratamento de erro
                echo "Erro ao atualizar dados";
                require(__DIR__ . '/App/Views/404.php');
            }
        }

        $userData = [
            'id' => $obUser->id,
            'name' => $obUser->name,
            'email' => $obUser->email,
            'password' => $obUser->password
        ];
        include_once __DIR__ . '/../Views/Users/edit.view.php';
        exit();
    }

    /**
     * deleta user
     */
    public static function delete($id): void
    {
        $obUser = User::getUser($id);

        // valida user
        if (!$obUser) {
            header('location: /user/list'); 
            exit();
        }
        
        // valida $_post
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $updateResult = $obUser->excluir();
            
            if ($updateResult) {
                // redireciona após a atualização bem-sucedida
                header('location: /user/list');
                exit();
            } else {
                // tratamento de erro
                echo "Erro ao atualizar dados";
                require(__DIR__ . '/App/Views/404.php');
            }
        }

        $userData = [
            'id' => $obUser->id
        ];
        
        include_once __DIR__ . '/../Views/Users/delete.view.php';
        exit();
    }

    /**
     * sai da conta
     */
    public static function logout(): void 
    {
        $users = [];
        include_once __DIR__ . '/../Views/Users/logout.view.php';
        exit();
    }
}