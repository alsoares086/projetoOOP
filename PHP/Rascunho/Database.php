<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'dbacademico';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo 'Connection error: ' . $exception->getMessage();
        }

        return $this->conn;
    }

    public function insert($tabela, $dados) {
        $colunas = implode(', ', array_keys($dados));
        $placeholders = ':' . implode(', :', array_keys($dados));
        $sql = "INSERT INTO $tabela ($colunas) VALUES ($placeholders)";

        try {
            $stmt = $this->conn->prepare($sql);
            foreach ($dados as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $stmt->execute();
        } catch(PDOException $exception) {
            echo 'Insert error: ' . $exception->getMessage();
        }
    }
}

?>

