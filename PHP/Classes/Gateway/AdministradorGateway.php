<?php
   
    //Esse perfil irá ser responsável por inserir as disciplinas e os cursos 
    //Classe AdministradorGateway
    class AdministradorGateway {
        private static $conn;

        public static function setConnection (PDO $conn) {
            self::$conn = $conn; //::chamando um atributo estático de uma classe 
        }//Fim do método setConnection()

        //Método find() - buscar
        public function find ($id, $class = 'stdClass') {
            $sql = "SELECT * FROM administrador WHERE id = '$id'";
            //print "$sql <br>\n";
            $result = self::$conn->query($sql);
            //fetchObject() retornar a próxima linha (registro) como um objeto
            return $result->fetchObject($class);
        }//Fim do método find()

        //Método all()
        public function all ($filter, $class = 'stdClass') {
            $sql = "SELECT * FROM administrador";
            if ($filter) {
                $sql .= "WHERE $filter";
            }
            //print "$sql <br>\n";
            $result = self::$conn->query($sql);
            return $result->fetchAll(PDO::FETCH_CLASS, $class); //retorna um array de objetos
        }//Fim do método all()

        //Método delete()
        public function delete ($id) {
            $sql = "DELETE FROM administrador WHERE id = '$id'";
            //print "$sql <br>\n";
            return self::$conn->query($sql);
        }//Fim do método delete()

        //Método save()
        public function save ($data) {
            if (empty($data->id)) { //Id não localizado - Insere
                $id = $this->getLastId() + 1;
                $sql = "INSERT INTO administrador 
                (id, nome, matricula,senha)
                VALUES ('{$id}', '{$data->nome}', '{$data->matricula}', '{$data->senha}')"; 
            }
            else { //Id localizado - Atualiza
                $sql = "UPDATE administrador SET 
                nome = '{$data->nome}',
                matricula = '{$data->matricula}',
                senha = '{$data->senha}',
                WHERE id = '{$data->id}'";
        }
           //print "$sql <br>\n";
            return self::$conn->exec($sql); //executa a instrução SQL
        }//Fim do método save()

        //Método getLastId()
        public function getLastId() {
            $sql = "SELECT max(id) as max FROM administrador";
            $result = self::$conn->query($sql);
            $data = $result->fetch(PDO::FETCH_OBJ);
            return $data->max;
        }//Fim do método getLastId()

        //Método autenticacao()
        public function autenticacao($matricula, $password) {
            try {
                $sql = "SELECT * FROM administrador WHERE matricula = :matricula and senha = :senha";
                $stmt = self::$conn->prepare($sql);
                $stmt->bindValue(':matricula', $imatriculad);
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
        
    }//Fim da clase AdministradorGateway
?>