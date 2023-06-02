<?php
//objeto de dominio -> simular uma aplicação
//classe Aluno 
class Aluno{
     private static $conn;
     private $data;
    
  public static function setConnection (PDO $conn){
    self::$conn = $conn;
    AlunoGateway::setConnection($conn);
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
     $pdg = new AlunoGateway;
     return $pdg->find($id,'aluno');
  }//fim do metodo find() 

  //metodo all()
  public static function all($filter = ''){
     $pdg = new AlunoGateway;
     return $pdg->all($filter, 'aluno');
  }//fim do metodo all

  //metodo delete()
  public function delete(){
     $pdg = new AlunoGateway;
      return $pdg->delete($this->idAluno);
  }//fim do metodo delete()

  //metodo save()
  public function save(){
    $pdg = new AlunoGateway;
    return $pdg->save((object)$this->data);
  }//fim do metodo save()

  public function autenticar(){
   $pdg = new AlunoGateway;
   return $pdg->autenticar($user, $password);
  }


}//fim da classe Produto 

?>