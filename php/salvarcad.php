<?php
session_start();
include("conexao.php");
?>
<html>
<head>
</head>
</html>
<?php
$nomecat   = $_POST["nomecat"];
$tipocat = $_POST["tipocat"];
$nomeimg = strtolower($_FILES['imgcat']['name']);
    $diretorio = "../upload/categoria/";
    $imgprod = $nomeimg;
    move_uploaded_file ($_FILES['imgcat']['tmp_name'], $diretorio.$imgprod);
$sql = "INSERT INTO categoria ( nomecat , tipocat, imagem)
VALUES ( '$nomecat', '$tipocat', '$imgprod')";
$query = $mysqli->query($sql);
$mysqli->close();
header("Location:../produtos.php");
?>
