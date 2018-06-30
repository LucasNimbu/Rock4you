<?php
session_start();
include("conexao.php");
$nome      = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email     = $_POST["email"];
$sexo      = $_POST["sexo"];
$telefone  = $_POST["telefone"];
$nasc      = $_POST["nasc"];
$nivel     = $_POST["nivel"];
$id    	   = $_POST["id"];
$sql = "UPDATE usuarios SET nome = '$nome', sobrenome = '$sobrenome', email = '$email',
sexo = '$sexo', telefone = '$telefone', nasc = '$nasc', nivel='$nivel' WHERE usuarios.iduser = $id";
$query = $mysqli->query($sql);
$mysqli->close();
echo "<script>cadalterad()</script>"
?>
