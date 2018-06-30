<?php
session_start();
include("conexao.php");
$id = $_GET["id"];
settype($id, "integer");
$sql = "delete from ingressos where id = $id";
$query = $mysqli->query($sql);
$query->affected_rows;
$mysqli->close();
header("Location: ../cadingresso.php");
?>
