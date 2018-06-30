<?php
session_start();
include("conexao.php");

$nome      = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email     = $_POST["email"];
$senha     = $_POST["senha"];
$cpf       = $_POST["cpf"];
$sexo      = $_POST["sexo"];
$telefone  = $_POST["telefone"];
$nasc      = $_POST["nasc"];



$sql = "INSERT INTO usuarios ( nome , sobrenome , email , senha , cpf , sexo  , telefone , nasc )
VALUES ( '$nome', '$sobrenome', '$email','$senha', '$cpf', '$sexo' , '$telefone', '$nasc' )";
$query = $mysqli->query($sql);

$mysqli->close();
header("Location:../loginuser.php");
?>
