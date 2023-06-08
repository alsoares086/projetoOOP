<?php

// Classe AlunoMapper
class AdministradorMapper {

    private static $conn;

    // Método setConnection()
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }    

    //Método save()
    public static function save(Administrador $adm){

        $nome = $adm->getNome();
        $matricula = $adm->getMatricula();
        $senha = $adm->getSenha();                    
            
        $sql = "INSERT INTO administrador (nome, matricula, senha) VALUES (:nome, :matricula, :senha)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        /*
        $id = self::$conn->lastInsertId();
        $turma->setId($id);*/
   }// Fim do método save()
   

    // Método delete()
    public static function delete($id)
    {
        $sql = "DELETE FROM administrador WHERE id = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Método find()
    public static function find($id)
    {
        $sql = "SELECT * FROM administrador WHERE id = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Método all()
    public static function all()
    {
        $sql = "SELECT * FROM administrador";
        $stmt = self::$conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }//Fim do método all()

    //Método autenticacao()
    public static function autenticacao($matricula, $senha) {
        $sql = "SELECT * FROM administrador WHERE matricula = :matricula and senha = :senha";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $adm = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($adm == null) {
            return false; 
        }
        return true; 
            
    }//fim do método autenticacao()
}
?>
