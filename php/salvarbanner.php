<?php
session_start();
include("conexao.php");
$caminho = strtolower($_FILES['imgcaminho']['name']);
$link = $_POST['link'];
	if(isset($_FILES['imgcaminho'])){
$sql = "INSERT INTO banner ( imgcaminho , link)
			VALUES ( '$caminho', '$link')";
$nomeimg = strtolower($_FILES['imgcaminho']['name']);
    $diretorio = "../upload/banner/";
    $imgprod = $nomeimg;
    move_uploaded_file ($_FILES['imgcaminho']['tmp_name'], $diretorio.$imgprod);
};
$query = $mysqli->query($sql);
$mysqli->close();
header("Location:../banner.php");
?>
