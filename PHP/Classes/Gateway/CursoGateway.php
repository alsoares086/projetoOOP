<?php
    
    //Classe CursoGateway
    class CursoGateway {
        private static $conn;

        //Método setConnection()
        public static function setConnection (PDO $conn) {
            self::$conn = $conn; //::chamando um atributo estático de uma classe 
        }//Fim do método setConnection()

        //Método find() - buscar
        public function find ($id, $class = 'stdClass') {
            $sql = "SELECT * FROM curso WHERE idCurso = '$id'";
            //print "$sql <br>\n";
            $result = self::$conn->query($sql);
            //fetchObject() retornar a próxima linha (registro) como um objeto
            return $result->fetchObject($class);
        }//Fim do método find()

        //Método all()
        public function all ($filter, $class = 'stdClass') {
            $sql = "SELECT * FROM curso ";
            if ($filter) {
                $sql .= "WHERE $filter";
            }
            //print "$sql <br>\n";
            $result = self::$conn->query($sql);
            return $result->fetchAll(PDO::FETCH_CLASS, $class); //retorna um array de objetos
        }//Fim do método all()

        //Método delete()
        public function delete ($id) {
            $sql = "DELETE FROM curso WHERE idCurso = '$id'";
            //print "$sql <br>\n";
            return self::$conn->query($sql);
        }//Fim do método delete()

        //Método save()
        public function save ($data) {
            if (empty($data->id)) { //Id não localizado - Insere
                $id = $this->getLastId() + 1;
                $sql = "INSERT INTO curso 
                (idCurso,nomeCurso,cargaHorariaCurso,tipoCurso)
                VALUES ('{$id}', '{$data->nomeCurso}', '{$data->cargaHorariaCurso}', '{$data->tipoCurso}')"; 
            }
            else { //Id localizado - Atualiza
                $sql = "UPDATE aluno SET 
                nomeCurso = '{$data->nomeCurso}',
                cargaHorariaCurso = '{$data->cargaHorariaCurso}',
                tipoCurso = '{$data->tipoCurso}',
                WHERE idCurso = '{$data->id}'";
        }
           //print "$sql <br>\n";
            return self::$conn->exec($sql); //executa a instrução SQL
        }//Fim do método save()

        //Método getLastId()
        public function getLastId() {
            $sql = "SELECT max(idCurso) as max FROM curso";
            $result = self::$conn->query($sql);
            $data = $result->fetch(PDO::FETCH_OBJ);
            return $data->max;
        }//Fim do método getLastId()

            
    }//Fim da clase CursoGateway
?>