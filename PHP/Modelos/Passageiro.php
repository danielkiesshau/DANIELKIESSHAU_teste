<?php
require_once($_SERVER['DOCUMENT_ROOT']."/PHP/Sql.php");

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

            //Inserting in DB
            $sql->query("INSERT INTO PASSAGEIROS(nome, dt_nascimento, cpf, sexo, id_motorista) VALUES(:nome, :dt_nascimento, :cpf, :sexo, :id_motorista)",array(
                ':nome' => $this->getNome(),
                ':dt_nascimento' => $this->getDt_Nascimento(),
                ':cpf' => $this->getCPF(),
                ':id_motorista' => $this->getIdMotorista(),
                ':sexo' => $this->getSexo()
            ));

            //Redirecting to passageiro.html
            header('Location: https://whispering-eyrie-32116.herokuapp.com/Paginas/HTML/passageiro.html?error=0'); 

        }catch(PDOException $e){
            echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
            //Redirecting to passageiro.html
            header('Location: https://whispering-eyrie-32116.herokuapp.com/Paginas/HTML/passageiro.html?error=1'); 
        }

    }
    
    public static function getListPassageiros(){
        try{
            $sql = new Sql(); 

            $rs = $sql->select("SELECT * FROM PASSAGEIROS");

            return $rs;

        }catch(PDOException $e){
            echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
        }
    
    }
    
}

if(isset($_GET['build-table'])){
    $rs = Passageiro::getListPassageiros(); 
}

?>
<!DOCTYPE html>
<html>
<meta charset='UTF-8'>
<head></head>
<body>
    <div id="dadosPHP" style="display:none;"><?php if(isset($rs)){echo json_encode($rs);}?></div>
    <script src="../../lib/jquery-1.11.1.js"></script>
    <script type=text/javascript>
    
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
                window.location.href="https://whispering-eyrie-32116.herokuapp.com/Paginas/HTML/passageiro.html?table=1";

            });
        
    </script>
</body>
</html>



