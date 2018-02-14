<?php
require_once(__DIR__."/../Sql.php");

class Corrida{
    private $vl_corrida;
    private $id_motorista;
    
    
    
    public function __construct($vl_corrida, $id_motorista){
        $this->vl_corrida = $vl_corrida;
        $this->id_motorista = $id_motorista;
    }
   
    public function getVlCorrida(){
        return $this->vl_corrida;
    }
    
    public function setVlCorrida($vl_corrida){
        $this->vl_corrida = $vl_corrida;
    }
    
    public function getIdMotorista(){
        return $this->id_motorista;
    }
    
    public function setIdMotorista($id_motorista){
        $this->id_motorista = $id_motorista;
    }  
   
    public function insertCorrida(){
    try{
          
        $sql = new Sql(); 
        echo $this->getIdMotorista();
        //Inserção , 
        $sql->query("INSERT INTO CORRIDAS(vl_corrida, id_motorista) VALUES(:vl_corrida, :id_motorista)",array(
            ':vl_corrida' => $this->getVlCorrida(),
            ':id_motorista' => $this->getIdMotorista()
        ));
      
        //Redirecting to corrida.html
        header('Location: http://localhost/Projeto/Paginas/HTML/corrida.html'); 
        
    }catch(PDOException $e){
        echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
    }
         echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
    }
    
    public function getListCorridas(){
    try{
        $sql = new Sql(); 

        $rs = $sql->select("SELECT * FROM CORRIDAS");

        return json_encode($rs);

    }catch(PDOException $e){
        echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
    }
    
    }
    
}

?>