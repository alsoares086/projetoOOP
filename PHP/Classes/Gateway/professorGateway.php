<?php
    
    //Classe ProfessorGateway
    class ProfessorGateway {
        private static $conn;

        //Método setConnection()
        public static function setConnection (PDO $conn) {
            self::$conn = $conn; //::chamando um atributo estático de uma classe 
        }//Fim do método setConnection()

        //Método find() - buscar
        public function find ($id, $class = 'stdClass') {
            $sql = "SELECT * FROM professor WHERE idProfessor = '$id'";
            //print "$sql <br>\n";
            $result = self::$conn->query($sql);
            //fetchObject() retornar a próxima linha (registro) como um objeto
            return $result->fetchObject($class);
        }//Fim do método find()

        //Método all()
        public function all ($filter, $class = 'stdClass') {
            $sql = "SELECT * FROM professor ";
            if ($filter) {
                $sql .= "WHERE $filter";
            }
            //print "$sql <br>\n";
            $result = self::$conn->query($sql);
            return $result->fetchAll(PDO::FETCH_CLASS, $class); //retorna um array de objetos
        }//Fim do método all()

        //Método delete()
        public function delete ($id) {
            $sql = "DELETE FROM professor WHERE idProfessor = '$id'";
            //print "$sql <br>\n";
            return self::$conn->query($sql);
        }//Fim do método delete()

        //Método save()
        public function save ($data) {
            if (empty($data->id)) { //Id não localizado - Insere
                $id = $this->getLastId() + 1;
                $sql = "INSERT INTO professor 
                (idProfessor, nomeProfessor, escolaridade, especializacao, senhaProfessor, usuarioProfessor) VALUES ('{$id}', '{$data->nomeProfessor}', 
                '{$data->escolaridade}', '{$data->especializacao}', '{$data->senhaProfessor}', '{$data->usuarioProfessor}')"; 
            }
            else { //Id localizado - Atualiza
                $sql = "UPDATE professor SET 
                nomeProfessor = '{$data->nomeProfessor}', 
                escolaridade = '{$data->escolaridade}',
                especializacao = '{$data->especializacao}',
                senhaProfessor = '{$data->senhaProfessor}',
                usuarioProfessor = '{$data->usuarioProfessor}'
                WHERE idProfessor = '{$data->id}'";
            }
            //print "$sql <br>\n";
            return self::$conn->exec($sql); //executa a instrução SQL
        }//Fim do método save()

        //Método getLastId()
        public function getLastId() {
            $sql = "SELECT max(idProfessor) as max FROM professor";
            $result = self::$conn->query($sql);
            $data = $result->fetch(PDO::FETCH_OBJ);
            return $data->max;
        }//Fim do método getLastId()

        //Método autenticacao()
        public function autenticacao($id, $password) {
            try {
                $sql = "SELECT * FROM professor WHERE idProfessor = :id and senhaProfessor = :senha";
                $stmt = self::$conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':senha', $password);
                $stmt->execute();
                $userDB = $stmt->fetch(PDO::FETCH_OBJ);
        
                if ($userDB == null ) {
                    return false;

                } else {
                    return true;
                }
            } catch (PDOException $erro) {
                throw $erro;
            }
        }//Fim do método autenticacao
        
    }//Fim da clase ProdutoGateway
?>