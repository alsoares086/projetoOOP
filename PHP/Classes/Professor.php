<?php
//objeto de dominio -> simular uma aplicação
//classe Professor 
class Professor{
     private static $conn;
     private $data;
    
  public static function setConnection (PDO $conn){
    self::$conn = $conn;
    ProfessorGateway::setConnection($conn);
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
     $pdg=new ProfessorGateway;
     return $pdg->find($id, 'professor');
  }//fim do metodo find() 

  //metodo all()
  public static function all($filter = ''){
     $pdg = new ProfessorGateway;
     return $pdg->all($filter, 'professor');
  }//fim do metodo all

  //metodo delete()
  public function delete(){
      $pdg = new ProfessorGateway; 
      return $pdg->delete($this->idProfessor);
  }//fim do metodo delete()

  //metodo save()
  public function save(){
    $pdg = new ProfessorGateway; 
    return $pdg->save((object)$this->data);
  }//fim do metodo save()

  public function autenticacao($user, $password){
  $pdg = new ProfessorGateway;
  return $pdg->autenticacao($this->idProfessor, $this->senhaProfessor);
  }


}//fim da classe Produto 

?>