<?php
require_once(__DIR__."/../Sql.php");

class Passageiro{
    private $nome;
    private $dt_nascimento;
    private $cpf;
    private $sexo;
    private $id_motorista;
    
    
    
    public function __construct($nome, $dt_nascimento, $cpf, $sexo, $id_motorista){
        $this->nome = $nome;
        $this->dt_nascimento = $dt_nascimento;
        $this->cpf = $cpf;
        $this->id_motorista = $id_motorista;
        $this->sexo = $sexo;
     
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getDt_Nascimento(){
        return $this->dt_nascimento;
    }
    
    public function setDt_Nascimento($dt_nascimento){
        $this->dt_nascimento = $dt_nascimento;
    }
    
    public function getCPF(){
        return $this->cpf;
    }
    
    public function setCPF($cpf){
        $this->cpf = $cpf;
    }
    
    public function getIdMotorista(){
        return $this->id_motorista;
    }
    
    public function setIdMotorista($id_motorista){
        $this->id_motorista = $id_motorista;
    }
    
    public function getSexo(){
        return $this->sexo;
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function insertPassageiro(){
    try{
        
        $sql = new Sql(); 
  
        //Inserção 
        $sql->query("INSERT INTO PASSAGEIROS(nome, dt_nascimento, cpf, sexo, id_motorista) VALUES(:nome, :dt_nascimento, :cpf, :sexo, :id_motorista)",array(
            ':nome' => $this->getNome(),
            ':dt_nascimento' => $this->getDt_Nascimento(),
            ':cpf' => $this->getCPF(),
            ':id_motorista' => $this->getIdMotorista(),
            ':sexo' => $this->getSexo()
        ));
      
        //Redirecionamento de página
        header('Location: http://localhost/Projeto/Paginas/HTML/passageiro.html'); 
        
    }catch(PDOException $e){
        echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
    }

    }
    
    public function getListPassageiros(){
    try{
        $sql = new Sql(); 

        $rs = $sql->select("SELECT * FROM PASSAGEIROS");

        return json_encode($rs);

    }catch(PDOException $e){
        echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
    }
    
    }
    
}

?>