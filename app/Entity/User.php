<?php

namespace App\Entity;

use \App\Db\Database;
use PDO;

class User
{
    public function __construct(
        public int $id,
        public string $name,
        public string $birthdate,
        public string $cpf,
        public ?string $gender = null,
        public ?string $city,
        public ?string $neighborhood,
        public ?string $street,
        public ?string $houseNumber,
        public ?string $complement,
    ) {
    }

    public static function make(array $payload): self {
        return new User(
            id: $payload['id'] ?? 0,
            name: $payload['name'],
            birthdate: $payload['birthdate'],
            cpf: $payload['cpf'],
            gender: $payload['gender'],
            city: $payload['city'],
            neighborhood: $payload['neighborhood'],
            street: $payload['street'],
            houseNumber: $payload['house_number'],
            complement: $payload['complement']
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
            'birthdate' => $this->birthdate,
            'cpf' => $this->cpf,
            'gender' => $this->gender,
            'city' => $this->city,
            'neighborhood' => $this->neighborhood,
            'street' => $this->street,
            'house_number' => $this->houseNumber,
            'complement' => $this->complement
        ]);

        return true;
    }

    public function atualizar()
    {
        return (new Database('users'))->update('id = '.$this->id,[
            'name' => $this->name,
            'birthdate' => $this->birthdate,
            'cpf' => $this->cpf,
            'gender'=> $this->gender,
            'city' => $this->city,
            'neighborhood' => $this->neighborhood,
            'street' => $this->street,
            'house_number' => $this->houseNumber,
            'complement' => $this->complement
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