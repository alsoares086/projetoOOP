<?php
//objeto de dominio -> simular uma aplicação
//classe Aluno 
class Disciplina{
     private static $conn;
     private $data;
    
  public static function setConnection (PDO $conn){
    self::$conn = $conn;
    DisciplinaGateway::setConnection($conn);
  }
    //metodo_set()
   //metodo magico
   public function __set($prop,$value){
      $this->data[$prop]=$value;
   }//fim do metodo magico


  //metodo__get()
  public function __get($prop){
     return $this->data[$prop];
  }//fim do metodo

  
  //metodo find()
  public static function find($id){
     $pdg = new DisciplinaGateway;
     return $pdg->find($id,'disciplina');
  }//fim do metodo find() 

  //metodo all()
  public static function all($filter = ''){
     $pdg = new DisciplinaGateway;
     return $pdg->all($filter, 'disciplina');
  }//fim do metodo all

  //metodo delete()
  public function delete(){
     $pdg = new DisciplinaGateway;
      return $pdg->delete($this->idDisciplina);
  }//fim do metodo delete()

  //metodo save()
  public function save(){
    $pdg = new DisciplinaGateway;
    return $pdg->save((object)$this->data);
  }//fim do metodo save()


}//fim da classe Disciplina 

?>