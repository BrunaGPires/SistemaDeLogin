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

        $all = $db->select();
        $users = $all->fetchAll(PDO::FETCH_ASSOC);

        include_once __DIR__ . '/../Views/Users/list.view.php';
    }

    public static function create(): void
    {
        if (!isset($_POST['name'], $_POST['birthdate'], $_POST['cpf'], $_POST['gender'],
             $_POST['city'], $_POST['neighborhood'], $_POST['street'], $_POST['house_number'], $_POST['complement'])) 
        {
            header('Location: /user');
            die;
        }
        
        // cria um novo objeto User e atribui os valores
        $userData = [
            'name' => $_POST['name'],
            'birthdate' => $_POST['birthdate'],
            'cpf' => $_POST['cpf'],
            'gender' => $_POST['gender'],
            'city' => $_POST['city'],
            'neighborhood' => $_POST['neighborhood'],
            'street' => $_POST['street'],
            'houseNumber' => $_POST['house_number'],
            'complement' => $_POST['complement']
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
            $obUser->birthdate = $_POST['birthdate'];
            $obUser->cpf = $_POST['cpf'];
            $obUser->gender = $_POST['gender'];
            $obUser->city = $_POST['city'];
            $obUser->neighborhood = $_POST['neighborhood'];
            $obUser->street = $_POST['street'];
            $obUser->houseNumber = $_POST['house_number'];
            $obUser->complement = $_POST['complement'];
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
            'birthdate' => $obUser->birthdate,
            'cpf' => $obUser->cpf,
            'gender' => $obUser->gender,
            'city' => $obUser->city,
            'neighborhood' => $obUser->neighborhood,
            'street' => $obUser->street,
            'house_number' => $obUser->houseNumber,
            'complement' => $obUser->complement
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

}