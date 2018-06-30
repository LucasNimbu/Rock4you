<?php
session_start();
include("php/conexao.php");
include("php/conexao_menu.php");
$buscaprod = $_GET["buscaprod"];
$sql = "SELECT * from produto WHERE nomeprod LIKE '%".$buscaprod."%'  OR descricao LIKE '%".$buscaprod."%' ";
$query = $mysqli->query($sql);
$result = mysqli_num_rows($query);
if($query >= "1") {
  echo "Exibindo ".$result." resultados para <strong>".$buscaprod."</strong><br><br>";
  while($linha = mysqli_fetch_array($query)) {
    $nomeprod = $linha["nomeprod"];
    echo $nomeprod."<br>";
  }
} else {
  echo "N�o foi encontrado nenhum resultado para <strong>".$buscaprod."</strong>";
}
?>
