<?php

//Include other .php required files
require_once(__DIR__."/../../PHP/config.php");
if($_GET['update']== null){
    //Get data from the URL
    $motorista = getNewMotorista();
    $motorista->insertMotorista();

}else if($_GET['update'] == 1){
    //Get data from the URL
    $motorista = getNewMotorista(); 
    $motorista->updateMotorista();
}
    
function getNewMotorista(){
    $get = array(
    'nome' => $_GET['nome'],
    'dt_nascimento' => $_GET['dt_nascimento'],
    'cpf' => $_GET['cpf'],
    'modelo_car' => $_GET['modelo_car'],
    'status' => $_GET['status'],
    'sexo' => $_GET['sexo']);
    $motorista = new Motorista($get['nome'], $get['dt_nascimento'], $get['cpf'], $get['modelo_car'], $get['status'], $get['sexo']);
    return $motorista;
}
?>