<?php

namespace App\Entity;

use \App\Db\Database;
use PDO;

class User
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $password,
    ) {
    }

    public static function make(array $payload): self {
        return new User(
            id: $payload['id'] ?? 0,
            name: $payload['name'],
            email: $payload['email'],
            password: $payload['password']
        );
    }

    /**
     * cadastra novo user no banco
     */
    public function cadastrar()
    {
        $obDatabase = new Database('users');
        $this->id = $obDatabase->insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        return true;
    }

    public function atualizar()
    {
        return (new Database('users'))->update('id = '.$this->id,[
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }

    public function excluir()
    {
        return (new Database('users'))->delete('id = ' . $this->id);
    }

    /**
     * obter os users do banco de dados
     */
    public static function getUsers($where = null, $order = null, $limit = null)
    {
        return (new Database('users'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * obtem user por id
     */
    public static function getUser($id)
    {
        return self::make((new Database('users'))->select('id = ' . $id)->fetch(PDO::FETCH_ASSOC));
    }
}
?>