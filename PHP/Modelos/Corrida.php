<?php
require_once($_SERVER['DOCUMENT_ROOT']."/PHP/Sql.php");

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
            header('Location: https://whispering-eyrie-32116.herokuapp.com/Paginas/HTML/corrida.html?'); 

        }catch(PDOException $e){
            echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
            //Redirecting to corrida.html
            header('Location: https://whispering-eyrie-32116.herokuapp.com/Paginas/HTML/corrida.html?');
        }
    }
    
    public static function getListCorridas(){
        try{
            $sql = new Sql(); 

            $rs = $sql->select("SELECT * FROM CORRIDAS");
            

            return $rs;

        }catch(PDOException $e){
            echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
        }

    }
    
    public static function getMotoristas(){
        try{
            $sql = new Sql(); 

            $nomes = $sql->select("SELECT * FROM MOTORISTAS");
            

            return $nomes;

        }catch(PDOException $e){
            echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
        }
        
    }
    
}

if(isset($_GET['build-table'])){
    $rs = Corrida::getListCorridas(); 
    //Get the names of the driver to conver the id_motorista to nome
    $nomes = Corrida::getMotoristas();
}

?>
<!DOCTYPE html>
<html>
<meta charset='UTF-8'>
<head></head>
<body>
    <div id="dadosPHP" style="display:none;"><?php if(isset($rs)){echo json_encode($rs);}?></div>
    <div id="nomesPHP" style="display:none;"><?php if(isset($nomes)){echo json_encode($nomes);}?></div>
    <script src="../../lib/jquery-1.11.1.js"></script>
    <script type=text/javascript>
    
            //Clearing old JSON
            if(localStorage.getItem('content') != null){
                    localStorage.removeItem('content');
            }
        
            //Get the data stored in dadosPHP 
            $(document).ready(function(){

                var objJson = $("#dadosPHP").html();
             

                //Store
                localStorage.setItem('content', JSON.stringify(objJson));

            });
        
            //Clearing old JSON
            if(localStorage.getItem('nomes') != null){
                    localStorage.removeItem('nomes');
            }
        
            //Get the data stored in dadosPHP 
            $(document).ready(function(){

                var namesJson = $("#nomesPHP").html();
                   console.log(namesJson);
                
                //Store
                localStorage.setItem('nomes', JSON.stringify(namesJson));

            });
            window.location.href="https://whispering-eyrie-32116.herokuapp.com/Paginas/HTML/corrida.html?table=1";
        
    </script>
</body>
</html>
