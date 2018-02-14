<?php
require_once("Sql.php");
$sql = new Sql();
//This will result in a query of active drivers to pass to the JS to update the UI
$rs = $sql->select("SELECT nome FROM MOTORISTAS WHERE sstatus = :STATUS",array(":STATUS"=>1));
$data = json_encode($rs);
echo $data;
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
        
        //Redirecting to passageiro.html
        window.location.href="http://localhost/Projeto/Paginas/HTML/passageiro.html?update=1";

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
