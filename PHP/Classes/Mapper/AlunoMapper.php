<?php

// Classe AlunoMapper
class AlunoMapper {

    private static $conn;

    // Método setConnection()
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }    

    //Método save()
    public static function save(Aluno $aluno){

        $nome = $aluno->getNomeAluno();
        $matricula = $aluno->getMatriculaAluno();
        $senha = $aluno->getSenhaAluno();                    
            
        $sql = "INSERT INTO aluno (nomeAluno, matriculaAluno, senhaAluno) VALUES (:nome, :matricula, :senha)";
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
        $sql = "DELETE FROM aluno WHERE idAluno = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Método find()
    public static function find($id)
    {
        $sql = "SELECT * FROM aluno WHERE idAluno = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        if($data) {
            $aluno = new Aluno();
            $aluno->setIdAluno($data->idAluno);
    
            return $aluno;
        } else {
            return null; 
        }
    }

    // Método all()
    public static function all()
    {
        $sql = "SELECT * FROM aluno";
        $stmt = self::$conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }//Fim do método all()

    //Método autenticacao()
    public static function autenticacao($matricula, $senha) {
        $sql = "SELECT * FROM aluno WHERE matriculaAluno = :matricula and senhaAluno = :senha";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($aluno == null) {
            return false; 
        }
        return true; 
    
    }//fim do método autenticacao()
}

?>
