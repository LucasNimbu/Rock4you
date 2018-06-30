<?php
session_start();
include("conexao.php");

$id    	     	= $_POST["id"];
$quant				= $_POST["quant"];

$sql = "UPDATE estoque SET Quantidade = '$quant' WHERE Id = $id";
$query = $mysqli->query($sql);

$mysqli->close();
header("Location: ../estoque.php");
?>
