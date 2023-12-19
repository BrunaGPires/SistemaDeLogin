<?php

namespace App\Controllers;

use App\Db\Database;
use App\Entity\Protocol;
use App\Entity\User;
use PDO;
use DateTime;

class ProtocolController implements ControllerInterface
{
    public static function view(): void
    {
        $title = 'Criar Protocolo';
        include_once __DIR__ . '/../Views/Protocols/create.view.php';
    }


    public static function list(): void
    {
        $db = new Database('protocols');
        $protocols = [];

        if(isset($_GET['find']) && !empty($_GET['find']))
        {
            $all = $db->selectByDescription($_GET['find']);
        } else {
            $all = $db->selectJoin();
        }

        $protocols = $all->fetchAll(PDO::FETCH_ASSOC);

        include_once __DIR__ . '/../Views/Protocols/list.view.php';
    }

    public static function create(): void
    {
        if (!isset($_POST['description'], $_POST['deadline'], $_POST['user_id'])) 
        {
            header('location: /protocol');
            die;
        }
        $userId = $_POST['user_id'];
        $protocolData = [
            'description' => $_POST['description'],
            'deadline' => $_POST['deadline'],
            'user_id' => $userId
        ];

        $obProtocol = Protocol::make($protocolData);

        $obProtocol->cadastrar();

        header('location: /protocol/list');
        exit;
    }

    public static function edit($id): void
    {
        $obProtocol = Protocol::getProtocol($id);

        if(!$obProtocol) {
            header('location: /protocol/list');
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $obProtocol->description = $_POST['description'];
            $obProtocol->deadline = $_POST['deadline'];
            $obProtocol->user = User::getUser($_POST['user_id']);
            $updateResult = $obProtocol->atualizar();

            if ($updateResult) {
                header('location: /protocol/list');
                exit();
            } else {
                echo "Erro ao atualizar dados.";
                require(__DIR__ . '/App/Views/404.php');
            }
        }

        $protocolData = [
            'id' => $obProtocol->id,
            'description' => $obProtocol->description,
            'deadline' => $obProtocol->deadline,
            'user_id' => $obProtocol->user->id
        ];

        include_once __DIR__ . '/../Views/Protocols/edit.view.php';
        exit();
    }

    public static function delete($id)
    {
        $obProtocol = Protocol::getProtocol($id);

        if(!$obProtocol) {
            header('location: /protocol/list');
            exit();
        }

        // valida $_post
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $updateResult = $obProtocol->excluir();
            
            if ($updateResult) {
                // redireciona após a atualização bem-sucedida
                header('location: /protocol/list');
                exit();
            } else {
                // tratamento de erro
                echo "Erro ao atualizar dados";
                require(__DIR__ . '/App/Views/404.php');
            }
        }

        $protocolData = [
            'id' => $obProtocol->id
        ];

        include_once __DIR__ . '/../Views/Protocols/delete.view.php';
        exit();
    }
}