<?php
session_start();
include("conexao.php");
?>
<html>
<head>
</head>
</html>
<?php
$tamanho   = $_POST["nometamanho"];
$sql = "INSERT INTO tamanhos ( Tamanho)
VALUES ( '$tamanho')";
$query = $mysqli->query($sql);
$mysqli->close();
header("Location:../estoque.php");
?>
