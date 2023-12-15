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
             $_POST['city'], $_POST['neighborhood'], $_POST['street'], $_POST['house_number'], $_POST['complement'])) {
            header('Location: /user');
            die;
        }
        $obUser = new User();
        $obUser->name = $_POST['name'];
        $obUser->birthdate = $_POST['birthdate'];
        $obUser->cpf = $_POST['cpf'];
        $obUser->gender = $_POST['gender'];
        $obUser->city = $_POST['city'];
        $obUser->neighborhood = $_POST['neighborhood'];
        $obUser->street = $_POST['street'];
        $obUser->houseNumber = $_POST['house_number'];
        $obUser->complement = $_POST['complement'];
        $obUser->cadastrar();

        header('location: /user/list');
        exit;
    }

    public static function edit($id): void
    {
        if (!is_numeric($id)) {
            header('Location: /user/list'); 
            exit();
        }

        $obUser = User::getUser($id);
        //valida user
        if (!$obUser) {
            header('Location: /user/list'); 
            exit();
        }

        //valida post
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
            // Atualiza os dados do usuário no banco
            $updateResult = $obUser->atualizar();

            if ($updateResult) {
                // Redireciona após a atualização bem-sucedida
                header('Location: /user/list');
                exit();
            } else {
                // Tratamento de erro, se necessário
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

    public static function delete($id)
    {
        if (!is_numeric($id)) {
            header('Location: /user/list'); 
            exit();
        }

        $obUser = User::getUser($id);
        //valida user
        if (!$obUser) {
            header('Location: /user/list'); 
            exit();
        }
        //valida $_post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $obUser->excluir();
        
            header('location: indexUser.php?status=success');
            exit;
        }
    }

}