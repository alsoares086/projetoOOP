<?php

// Classe ProfessorMapper
class ProfessorMapper {

    private static $conn;

    // Método setConnection()
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }    

    //Método save()
    public static function save(Professor $professor){

        $nome = $professor->getNomeprofessor();
        $especializacao = $professor->getEspecializacao(); 
        $escolaridade = $professor->getEscolaridade(); 
        $matricula = $professor->getMatriculaProfessor();
        $senha = $professor->getSenhaProfessor();                    
            
        $sql = "INSERT INTO professor (nomeProfessor, escolaridade, especializacao, matriculaProfessor, senhaProfessor) VALUES (:nome, :escolaridade, :especializacao, :matricula, :senha)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':escolaridade', $escolaridade);
        $stmt->bindParam(':especializacao', $especializacao);
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
        $sql = "DELETE FROM professor WHERE idProfessor = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Método find()
    public static function find($id)
    {
        $sql = "SELECT * FROM professor WHERE idProfessor = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Método all()
    public static function all()
    {
        $sql = "SELECT * FROM professor";
        $stmt = self::$conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }//Fim do método all()


    //Método autenticacao()
    public static function autenticacao($matricula, $senha) {
        $sql = "SELECT * FROM professor WHERE matriculaProfessor = :matricula and senhaprofessor = :senha";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $professor = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($professor == null) {
            return false; 
        }
        return true; 
        
    }//fim do método autenticacao()
}
?>
