<!DOCTYPE html>
<html>
    <meta charset="UTF-8">    
    <head></head>
    <body>Hello</body>
</html>

<?php
/*
require_once("../JavaScript/Sql.php");


try{
    $sql = new Sql(); 

    $rs = $sql->select("SELECT * FROM MOTORISTAS");

    echo json_encode($rs);

}catch(PDOException $e){
    echo '<br/>ERROR '.$e->getMessage().'<br/> Line:'.$e->getLine().'<br/>'.$e->getFile();
}*/
$get = array(
'nome' => $_GET['nome'],
'dt_nascimento' => $_GET['dt_nascimento'],
'cpf' => $_GET['cpf'],
'modelo_car' => $_GET['modelo_car'],
'status' => $_GET['status'],
'sexo' => $_GET['sexo']);

echo json_encode($get);






?>