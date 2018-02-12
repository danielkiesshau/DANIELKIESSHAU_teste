<?php

//Inclue classes de outros arquivos PHP
require_once(__DIR__."/../../PHP/config.php");

//Pega dados da URL, obtidos no form da página anterior
$get = array(
'nome' => $_GET['nome'],
'dt_nascimento' => $_GET['dt_nascimento'],
'cpf' => $_GET['cpf'],
'modelo_car' => $_GET['modelo_car'],
'status' => $_GET['status'],
'sexo' => $_GET['sexo']);
$motorista = new Motorista($get['nome'], $get['dt_nascimento'], $get['cpf'], $get['modelo_car'], $get['status'], $get['sexo']);
$motorista->insertMotorista();
    





?>