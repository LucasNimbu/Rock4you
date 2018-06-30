<?php
session_start();
include("conexao.php");
$id = $_GET["id"];
settype($id, "integer");
$sql = "delete from produto where idprod = $id";
$query = $mysqli->query($sql);
$query->affected_rows;
$mysqli->close();
header("Location: ../produtos.php");
?>
