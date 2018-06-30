<?php
session_start();
include("conexao.php");
$nomeprod  = $_POST["nomeprod"];
$quantidade     = $_POST["quantidade"];
$tamanho   = $_POST["tamanho"];
$cor       = $_POST["cor"];
$sql = "INSERT INTO estoque (Nome , Quantidade , Tamanho , Cor)
			VALUES ('$nomeprod','$quantidade','$tamanho', '$cor')";
$query = $mysqli->query($sql);
$mysqli->close();
header("Location:../estoque.php");
?>
