<?php
//objeto de dominio -> simular uma aplicação
//classe Administrador 
class Administrador{
     private static $conn;
     private $data;
    
  public static function setConnection (PDO $conn){
    self::$conn = $conn;
    AdministradorGateway::setConnection($conn);
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
     $pdg = new AdministradorGateway;
     return $pdg->find($id,'administrador');
  }//fim do metodo find() 

  //metodo all()
  public static function all($filter = ''){
     $pdg = new AdministradorGateway;
     return $pdg->all($filter, 'administrador');
  }//fim do metodo all

  //metodo delete()
  public function delete(){
     $pdg = new AdministradorGateway;
      return $pdg->delete($this->id);
  }//fim do metodo delete()

  //metodo save()
  public function save(){
    $pdg = new AdministradorGateway;
    return $pdg->save((object)$this->data);
  }//fim do metodo save()

  public function autenticacao($user, $password){
    $pdg = new AdministradorGateway;
   return $pdg->autenticacao($this->matricula, $this->senha);

  }


}//fim da classe Produto 

?>