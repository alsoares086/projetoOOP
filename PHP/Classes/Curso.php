<?php
//objeto de dominio -> simular uma aplicação
//classe Aluno 
class Curso{
     private static $conn;
     private $data;
    
  public static function setConnection (PDO $conn){
    self::$conn = $conn;
    CursoGateway::setConnection($conn);
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
     $pdg = new CursoGateway;
     return $pdg->find($id,'curso');
  }//fim do metodo find() 

  //metodo all()
  public static function all($filter = ''){
     $pdg = new CursoGateway;
     return $pdg->all($filter, 'curso');
  }//fim do metodo all

  //metodo delete()
  public function delete(){
     $pdg = new CursoGateway;
      return $pdg->delete($this->idCurso);
  }//fim do metodo delete()

  //metodo save()
  public function save(){
    $pdg = new CursoGateway;
    return $pdg->save((object)$this->data);
  }//fim do metodo save()


}//fim da classe Produto 

?>