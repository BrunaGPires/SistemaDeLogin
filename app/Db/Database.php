<?php 
namespace App\Db;
use PDO;
use PDOException;

class Database{
    const HOST = 'localhost';
    const name = 'users';
    const USER = 'root';
    const PASS = 'root';

    private $table;
    private $connection;
    private $dbName;    

    public function __construct($table = null, $dbName = 'user')
    {
        $this->table = $table;
        $this->dbName = $dbName;
        $this->setConnection();
    }

    /**
     * conexão com o banco de dados
     */
    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . $this->dbName, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * executa querys
     */
    public function execute($query, $params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * insere dados
     */
    public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([], count($fields),'?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    /**
     * realiza consulta
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        return $this->execute($query);
    }

    /**
     * realiza consulta usuario por nome
     * SELECT * FROM users WHERE name LIKE '%fulano%';
     */
    public function selectByName($name, $where = null, $fields = '*', $order = null, $limit = null)
    {
        $where = strlen($where) ? 'WHERE name LIKE ? ' . $where : 'WHERE name LIKE ?';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        $name = '%' . $name . '%';

        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query, [$name]);
    }

    /**
     * realiza consulta com join para passar nome de user no list.view.php
     */
    public function selectJoin($where = null, $order = null, $limit = null){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT users.id AS user_id, users.name AS user_name, protocols.* FROM users INNER JOIN protocols ON users.id = protocols.user_id ' . $where . ' ' . $order . ' ' . $limit;
    
        return $this->execute($query);
    }

    public function findUserByEmail($email, $where = null, $fields = '*', $order = null, $limit = null)
    {
        $where = strlen($where) ? 'WHERE name LIKE ? ' . $where : 'WHERE name LIKE ?';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        $email = '%' . $email . '%';

        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query, [$email]);
    }
}
?>