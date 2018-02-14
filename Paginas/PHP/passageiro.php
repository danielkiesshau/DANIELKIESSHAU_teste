<?php

//Inclue classes de outros arquivos PHP
require_once(__DIR__."/../../PHP/config.php");
require_once(__DIR__."/../../PHP/Sql.php");
$sql = new Sql();


//Access database to get the id of the name informed by the passageiro.html
$nome_motorista = $_GET['nome-motorista'];

$ar_id_motorista = $sql->select("SELECT id_motorista FROM MOTORISTAS WHERE nome = :NOME", array(":NOME"=>$nome_motorista));

//casting array to int
$id_motorista = (int)implode("",array_values($ar_id_motorista[0]));

//Get fields from the URL
$get = array(
'nome' => $_GET['nome'],
'dt_nascimento' => $_GET['dt_nascimento'],
'cpf' => $_GET['cpf'],
'id-motorista' => $id_motorista,
'sexo' => $_GET['sexo']);

$passageiro = new Passageiro($get['nome'], $get['dt_nascimento'], $get['cpf'], $get['sexo'], $get['id-motorista']);
$passageiro->insertPassageiro();

    

?>

<script src="../../lib/jquery-1.11.1.js"></script>
<script type=text/javascript>
    //Clearing old JSON
    if(localStorage.getItem('obj') != null){
            localStorage.removeItem('obj');
    }
    //Get the data stored in dadosPHP 
    $(document).ready(function(){
        
        var dadosJson = $("#dadosPHP").html();
        
        //Converting data to JSON
        var objJson = JSON.parse(dadosJson);
        console.log(objJson);

        //Store
        localStorage.setItem('obj', JSON.stringify(objJson));


    });
</script>
<!DOCTYPE html>
<html>
<meta charset='UTF-8'>
<head></head>
<body>
    <div id="dadosPHP" style="display:none;"><?php echo $data?></div>
</body>
</html>


