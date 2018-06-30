<!DOCTYPE html>
<html>
<head>
  <script src='Js/jquery-3.2.1.min.js'></script>
  <script src='Js/jquery.elevateZoom-3.0.8.min.js'></script>
  <?php
  session_start();
  include("php/conexao.php");
  $id = $_GET["id"];
  settype($id, "integer");
  $sql = "select * from ingressos where id = $id";
  $adicionavisu = mysqli_query($db,"UPDATE ingressos SET visualizaçoes = visualizaçoes + 1 WHERE id='$id'");
  $query = $mysqli->query($sql);
  $dados  = mysqli_fetch_array($query);
  $preco = number_format($dados['preco'], 2, ',', ' ');
  ?>
  <meta charset='utf-8'>
  <link rel='shortcut icon' href='img/favicon.ico'>
  <link rel='stylesheet' type='text/css' href='css/style.css'>
  <link rel='stylesheet' type='text/css' href='css/pagprod.css'>
  <title>Rock For You</title>
</head>
<body>
  <?php
  include("php/conexao_menu_fixo.php");
  include("php/conexao_menu.php");
  include("php/conexao_banner.php");
  echo"<section id='produtos'>";
  echo "<div id='topinfo'>
  <div id='fotoingresso' style='background-repeat: no-repeat; background-position: center;background:url(upload/ingresso/".$dados['Imagem'].");background-size: cover;'></div>
  <div id='descricaoingresso'>";
  echo "<p class='nomeingresso'>" .$dados['nome']."</p>
  <p class='descingresso'>" .$dados['descricao']."</p>";
  echo "</div>";
  echo"<div id='ingressolateral'>
  <div id='div_preço'><p style='display:inline;'>- Valor: </p>
  <p style='display:inline;' class='pag_precoprod'> R$ " .$dados['preco']."</p></div>
  <p>- Data: ".implode( '/', array_reverse( explode( '-', $dados['data'] ) ) )."</p>
  <p>- Hora: ".$dados['hora']."</p>
  <p>- Local: ".$dados['local']."</p>";
  echo"</div>
  </div>
  <div id='bottominfo'>
  <p> Adquira já seu ingresso na Loja Rock For You</p>
  <img src='img/logo.png'>
  </div>";
  ?>
</form>
</div>
</section>
<?php include("php/Footer.php"); ?>
</body>
</html>
