<?php

//Inclue classes de outros arquivos PHP
require_once(__DIR__."/../../PHP/config.php");
require_once(__DIR__."/../../PHP/Sql.php");



//Acessa banco para obter id do motorista no lugar do nome informado no formulario
$nome_motorista = $_GET['nome-motorista'];
$sql = new Sql();
$ar_id_motorista = $sql->select("SELECT id_motorista FROM MOTORISTAS WHERE nome = :NOME", array(":NOME"=>$nome_motorista));
//convertendo o array em integer para o id to banco
$id_motorista = (int)implode("",array_values($ar_id_motorista[0]));

//Pega dados da URL, obtidos no form da página anterior

$get = array(
'nome' => $_GET['nome'],
'dt_nascimento' => $_GET['dt_nascimento'],
'cpf' => $_GET['cpf'],
'id-motorista' => $id_motorista,
'sexo' => $_GET['sexo']);

$passageiro = new Passageiro($get['nome'], $get['dt_nascimento'], $get['cpf'], $get['sexo'], $get['id-motorista']);
$passageiro->insertPassageiro();
    





?>