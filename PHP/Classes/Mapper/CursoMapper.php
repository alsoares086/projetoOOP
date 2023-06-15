<?php

// Classe CursoMapper
class CursoMapper {

    private static $conn;

    // Método setConnection()
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }    

    //Método save()
    public static function save(Curso $curso){

        $nomeCurso = $curso->getNomeCurso();
        $cargaHorariaCurso = $curso->getCargaHoraria();
        $tipoCurso = $curso->getTipoCurso();
        $turno = $curso->getTurnoCurso();
    
        $sql = "INSERT INTO curso (nomeCurso, cargaHorariaCurso, tipoCurso, turno) VALUES (:nomeCurso, :cargaHorariaCurso, :tipoCurso, :turno)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':nomeCurso', $nomeCurso);
        $stmt->bindParam(':cargaHorariaCurso', $cargaHorariaCurso);
        $stmt->bindParam(':tipoCurso', $tipoCurso);
        $stmt->bindParam(':turno', $turno);
        $stmt->execute();
        /*
        $id = self::$conn->lastInsertId();
        $turma->setId($id);*/
   }// Fim do método save()
   

    // Método delete()
    public static function delete($id)
    {
        $sql = "DELETE FROM curso WHERE idCurso = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Método find()
    public static function find($id)
    {
        $sql = "SELECT * FROM curso WHERE idCurso = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Método all()
    public static function all()
    {
        $sql = "SELECT * FROM curso";
        $stmt = self::$conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }//Fim do método all()

    //método findIdCurso()
    public static function findIdCurso($id){
        $sql = "SELECT * FROM curso WHERE idCurso = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($data) {
            $curso = new Curso();
            $curso->setId($data['idCurso']);
            // Defina os outros atributos do curso, se houver
    
            return $curso;
        }
    
        return null; // Curso não encontrado
    }//fim do método findIdCurso()

    //método findCursoByTipo
    public static function findCursosByTipo($tipo){
        $sql = "SELECT nomeCurso FROM curso where tipoCurso = :tipo";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':tipo',$tipo);
        $stmt->execute();
        $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cursos;
    }//fim do método findCursosByTipo($tipo)
}    
?>
