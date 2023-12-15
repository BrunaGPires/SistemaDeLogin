<?php

namespace App\Controllers;

use App\Db\Database;
use App\Entity\Protocol;
use App\Entity\User;
use PDO;

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

        $all = $db->selectJoin();
        $protocols = $all->fetchAll(PDO::FETCH_ASSOC);

        include_once __DIR__ . '/../Views/Protocols/list.view.php';
    }

    public static function create(): void
    {
        if (!isset($_POST['description'], $_POST['deadline'], $_POST['user_id'])) {
            header('Location: /protocol');
            die;
        }
        
        $obProtocol = new Protocol();
        $obProtocol->description = $_POST['description'];
        //$obProtocol->createdAt = $_POST['createdAt'];
        $obProtocol->deadline = $_POST['deadline'];
        $user = User::getUser($_POST['user_id']);

        if ($user) {
            $obProtocol->user = $user;
            $obProtocol->cadastrar();
        } else {
            header('location: /App/Views/404.php'); // Isso pode precisar ser ajustado
            exit;
        }

        header('location: /protocol/list');
        exit;
    }

    public static function edit($id): void
    {
        
    }

    public static function delete($id)
    {

    }

}