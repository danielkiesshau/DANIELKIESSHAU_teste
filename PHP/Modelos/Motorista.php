<?php
require_once(__DIR__."/../Sql.php");

class Motorista{
    private $nome;
    private $dt_nascimento;
    private $cpf;
    private $modelo_car;
    private $status;
    private $sexo;
    
    
    
    public function __construct($nome, $dt_nascimento, $cpf, $modelo_car, $status, $sexo){
        $this->nome = $nome;
        $this->dt_nascimento = $dt_nascimento;
        $this->cpf = $cpf;
        $this->modelo_car = $modelo_car;
        $this->status = $status;
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
    
    public function getModeloCar(){
        return $this->modelo_car;
    }
    
    public function setModeloCar($modelo_car){
        $this->modelo_car = $modelo_car;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    
    public function getSexo(){
        return $this->sexo;
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function insertMotorista(){
    try{
        $sql = new Sql(); 
        
        //Inserting
        $sql->query("INSERT INTO MOTORISTAS(nome, cpf, dt_nascimento, model_car, sstatus, sexo) VALUES(:nome, :cpf, :dt_nascimento, :modelo_car, :status, :sexo)",array(
            ':nome' => $this->getNome(),
            ':dt_nascimento' => $this->getDt_Nascimento(),
            ':cpf' => $this->getCPF(),
            ':modelo_car' => $this->getModeloCar(),
            ':status' => $this->getStatus(),
            ':sexo' => $this->getSexo()
        ));
        
        //Redirecting page
       header('Location: http://localhost/Projeto/Paginas/HTML/motorista.html'); 
        
    }catch(PDOException $e){
        echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
    }

    }
    
    public function updateMotorista(){
        try{
            $sql = new Sql(); 
            
            //Updating
            $sql->query("UPDATE MOTORISTAS SET nome=:nome, cpf = :cpf, dt_nascimento = :dt_nascimento, model_car = :modelo_car, sstatus = :status, sexo = :sexo WHERE nome = :condition AND cpf = :condition2",array(
                ':nome' => $this->getNome(),
                ':dt_nascimento' => $this->getDt_Nascimento(),
                ':cpf' => $this->getCPF(),
                ':modelo_car' => $this->getModeloCar(),
                ':status' => $this->getStatus(),
                ':sexo' => $this->getSexo(),
                ':condition' => $this->getNome(),
                ':condition2' => $this->getCPF()
            ));

            //Redirecting page
            header('Location: http://localhost/Projeto/Paginas/HTML/motorista.html'); 

        }catch(PDOException $e){
            echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
        }    
    }
    
    public static function getListMotoristas(){
    try{
        
        $sql = new Sql(); 

        $rs = $sql->select("SELECT * FROM MOTORISTAS");
        
        return $rs;

    }catch(PDOException $e){
        echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
    }
    
    }
    
    
}
if(isset($_GET['build-table'])){
    $build = $_GET['build-table'];
    $rs = Motorista::getListMotoristas();
    
}




?>
<!DOCTYPE html>
<html>
<meta charset='UTF-8'>
<head></head>
<body>
    <div id="dadosPHP"><?php if(isset($rs)){ echo json_encode($rs);}?></div>
    <div id="update"><?php if(isset($_GET['update'])){echo $_GET['update'];}?></div>
    <script src="../../lib/jquery-1.11.1.js"></script>
    <script type=text/javascript>
        var update = $("#update").html();
        if(update == 0){
            
            //Clearing old JSON
            if(localStorage.getItem('content') != null){
                    localStorage.removeItem('content');
            }
            //Get the data stored in dadosPHP 
            $(document).ready(function(){

                var objJson = $("#dadosPHP").html();

                console.log(objJson);
                //Store
                localStorage.setItem('content', JSON.stringify(objJson));
                window.location.href="http://localhost/Projeto/Paginas/HTML/motorista.html?table=1";

            });
        }
    </script>
</body>
</html>