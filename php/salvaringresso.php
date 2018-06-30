<?php
session_start();
include("conexao.php");
ini_set('default_charset', 'UTF-8');
?>
<html>
<head>
</head>
</html>
<?php
$nome   = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$data = $_POST["data"];
$hora = $_POST["hora"];
$local = $_POST["local"];
$banda = $_POST["banda"];
if(isset($_FILES['imgprod'])){
  $nomeimg = strtolower($_FILES['imgprod']['name']);
  $diretorio = "../upload/ingresso/";
  $imgprod = $nomeimg;
  move_uploaded_file ($_FILES['imgprod']['tmp_name'], $diretorio.$imgprod);
}
$sql = "INSERT INTO ingressos ( id, nome, descricao, preco, Imagem, data, hora, local, banda)
VALUES (Null, '$nome', '$descricao', '$preco', '$imgprod', '$data', '$hora', '$local', '$banda')";
$query = $mysqli->query($sql);
$mysqli->close();
header("Location:../cadingresso.php");
?>
