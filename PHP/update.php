<?php
require_once("Sql.php");
$sql = new Sql();
//This will result in a query of active drivers to pass to the JS to update the UI
$rs = $sql->select("SELECT nome FROM MOTORISTAS WHERE sstatus = :STATUS",array(":STATUS"=>1));
$data = json_encode($rs);
$tipo = $_GET['tipo'];
setcookie("tabela","1", time() + (400), "/");
?>

<script src="../lib/jquery-1.11.1.js"></script>
<script type=text/javascript>
    //Get the data stored in dadosPHP 
    $(document).ready(function(){

        var dadosJson = $("#dadosPHP").html();
        
        //Converting data to JSON
        var objJson = JSON.parse(dadosJson);


        //Store
        localStorage.setItem('obj', JSON.stringify(objJson));
        
        
        var tipo = $("#tipo").html();
        //Redirecting to passageiro.html
        if(tipo == 'passageiro'){
            window.location.href="https://whispering-eyrie-32116.herokuapp.com/Paginas/HTML/passageiro.html?update=1";
        }else if(tipo == 'corrida'){
            window.location.href="https://whispering-eyrie-32116.herokuapp.com/Paginas/HTML/corrida.html?update=1";
        }else{
            window.location.href="https://whispering-eyrie-32116.herokuapp.com/index.html"; 
        }
        
    });
</script>
<!DOCTYPE html>
<html>
<meta charset='UTF-8'>
<head></head>
<body>
    <div id="dadosPHP" style="display:none;"><?php echo $data;?></div>
    <div id="tipo" style="display:none;"><?php echo $tipo;?></div>
</body>
</html>
