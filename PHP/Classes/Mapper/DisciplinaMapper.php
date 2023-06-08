<?php

// Classe DisciplinaMapper
class DisciplinaMapper {

    private static $conn;

    // Método setConnection()
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }    

    //Método save()
    public static function save(Disciplina $disciplina){

        $nomeDisciplina = $disciplina->getNomeDisciplina();
        $cargaHorariaDisciplina = $disciplina->getCargaHoraria();
    
        $sql = "INSERT INTO disciplina (nomeDisciplina, cargaHorariaDisciplina) VALUES (:nomeDisciplina, :cargaHorariaDisciplina)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':nomeDisciplina', $nomeDisciplina);
        $stmt->bindParam(':cargaHorariaDisciplina', $cargaHorariaDisciplina);
        $stmt->execute();
        /*
        $id = self::$conn->lastInsertId();
        $turma->setId($id);*/
   }// Fim do método save()
   

    // Método delete()
    public static function delete($id)
    {
        $sql = "DELETE FROM disciplina WHERE idDisciplina = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Método find()
    public static function find($id)
    {
        $sql = "SELECT * FROM disciplina WHERE idDisciplina = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Método all()
    public static function all()
    {
        $sql = "SELECT * FROM disciplina";
        $stmt = self::$conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }//Fim do método all()
}
?>
