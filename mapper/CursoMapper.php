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
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($data) {
            $curso = new Curso();
            $curso->setId($data['idCurso']);
            $curso->setTurno($data['turno']);
            $curso->setNomeCurso($data['nomeCurso']);
            $curso->setTipoCurso($data['tipoCurso']);           
    
            return $curso;
        }
    
        return null;
    }

    // Método all()
    public static function all()
    {
        $sql = "SELECT * FROM curso";
        $stmt = self::$conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }//Fim do método all()

    public static function findCursoTipo($tipo) {
        $sql = "SELECT * FROM curso where tipoCurso = :tipo";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->execute();
    
        $cursos = array();
    
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $curso = new Curso();
            $curso->setId($data['idCurso']);
            $curso->setNomeCurso($data['nomeCurso']);
            $curso->setTipoCurso($data['tipoCurso']);
            $curso->setTurno($data['turno']);
    
            $cursos[] = $curso;
        }
    
        return $cursos;
    }
     
}
    
?>
