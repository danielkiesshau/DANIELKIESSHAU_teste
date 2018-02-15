<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
//Inclue classes de outros arquivos PHP
require_once("../../PHP/Modelos/Corrida.php");
require_once("../../PHP/Sql.php");
$sql = new Sql();

//Access database to get the id of the name informed by the corrida.html
$nome_motorista = $_GET['nome-motorista'];


$ar_id_motorista = $sql->select("SELECT id_motorista FROM MOTORISTAS WHERE nome = :NOME", array(":NOME"=>$nome_motorista));

//casting array to int
$id_motorista = (int)implode("",array_values($ar_id_motorista[0]));



$vl_corrida = $_GET['vl_corrida'];
//Pega dados da URL, obtidos no form da página anterior
$get = array(
    'vl-corrida' => $vl_corrida,
    'id-motorista' => $id_motorista
);


$corrida = new Corrida($get['vl-corrida'], $get['id-motorista']);
$corrida->insertCorrida();
    

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


