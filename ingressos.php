<?php
session_start();
include("php/conexao.php");
?>
<html>
<head>
  <script>

  function submit(){
    document.forms['form1'].submit();
  }
</script>
<script src='Js/jquery-3.2.1.min.js'/></script>
<script type="text/javascript" src="Js/coin-slider.js"></script>
<link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css" />
<script src="Js/funcoes.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>Rock For You</title>
<link rel="shortcut icon" href="img/favicon.ico">
<meta charset="utf-8">
</head>
<body onLoad="slide1()">
  <div id='interface'>
    <?php
    include("php/conexao_menu_fixo.php");
    include("php/conexao_menu.php");
    include("php/conexao_banner.php");
    echo"	  <script type='text/javascript'>
    $(document).ready(function() {
      $('#coin-slider').coinslider({effect: 'random', navigation: true,width:$('#coin-slider').parent().width(),height:400, delay: 5000 });
    });
    </script>";
    $sql1 = "SELECT * from ingressos ";
    if(!empty($_POST['txtFiltro']))
    {
      $filtro = $_POST['txtFiltro'];
      $sql1 .= "AND nomeprod LIKE '%" .$filtro."%'";
    }

    if(!empty($_POST['banda']))
    {
      $banda = $_POST['banda'];
      $sql1 .= "and banda ='".$banda."' ";
    }
    if(!empty($_POST['Order']))
    {
      $order = $_POST['Order'];
      $sql1 .= "ORDER BY $order ASC ";
    }else{
      $sql1 .= "ORDER BY id ASC ";
    }
    echo"<section id='produtos_pag_total'>
    <div id='produtos_pag_menu'>
    <div id='produtos_pag_menu_filtro'>
    <form name='form1' method='post' action=''>
    <input type='text' class='txtFiltro' name='txtFiltro' autocomplete='off'>
    <input type='image' src='img/Botao-pesquisar.png' name='btnFiltro' class='btnFiltro' value='BUSCAR'/>
    </form>
    <form name='form1' method='post' action=''>
    <select type='submit' name='Order' onchange='submit();'>";
    if(!empty($order))
    {
      echo "<option value='$order' selected>Ordenar por</option>";
    }else{ echo "<option value=''>Ordenar por</option>";};
    echo "<option value='nome'>Nome</option>
    <option value='preco'>Menor Preço</option>
    </select>
    </form>
    <form name='form1' method='post' action=''>
    <select type='submit' name='banda' onchange='submit();'>";
    if(!empty($banda))
    {
      echo "<option value='$banda' selected>Selecione uma banda</option>";
    }else{ echo "<option value=''>Selecione uma banda</option>";};
    $sqlbanda = 'SELECT DISTINCT banda FROM produto where categoria = '.$cat.'';
    $resultbanda = mysqli_query($db,$sqlbanda);
    while($row = mysqli_fetch_array($resultbanda)) {
      echo "<option value=".$row['banda'].">".$row['banda']."</option>";
    }
    echo"</select>
    </form>
    </div>
    </div>
    <section id='produtos_pag'>
    <span class='tituloprodutos'>Ingressos:</span>";
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
    $sql = "SELECT * from ingressos";
    $query = $mysqli->query($sql1);
    $result = mysqli_num_rows($query);
    $registros = 20;
    $numPaginas = ceil($result/$registros);
    $inicio = ($registros*$pagina)-$registros;
    $sql2 = "SELECT * from ingressos ";
    if(!empty($_POST['txtFiltro']))
    {
      $filtro = $_POST['txtFiltro'];
      $sql2 .= "AND nome LIKE '%" .$filtro."%'";
    }
    if(!empty($_POST['banda']))
    {
      $banda = $_POST['banda'];
      $sql2 .= "and banda ='".$banda."' ";
    }
    if(!empty($_POST['Order']))
    {
      $order = $_POST['Order'];
      $sql2 .= "ORDER BY $order ASC ";
    }else{
      $sql2 .= "ORDER BY nome ASC ";
    }
    $sql2 .= "limit $inicio,$registros";
    $query2 = $mysqli->query($sql2);
    while($row = mysqli_fetch_array($query2)) {
      $id = $row["id"];
      $preco = $row['preco'];
      $precov = number_format($preco, 2, ',', ' ');
      echo "<a href='pagingresso.php?id=$id'>";
      echo"<div class='div_ingresso' style='background:url(upload/ingresso/".$row['Imagem']."); background-size: 100%;'>";
      echo "<div class='divprecoing'><p class='valor'>  R$ ".$precov."</p></div>";
      echo "<div class='infoing'><span>" .$row['nome']."</span><p>Data: ".implode( '/', array_reverse( explode( '-', $row['data'] ) ) )."</p><p>Hora: ".$row['hora']."</p><p>Local: ".$row['local']."</p></div>";
      echo "</div>";
      echo "</a>";

    }
    echo"</section>
    </div>";
    include("php/Footer.php");
    ?>
  </body>
  </html>
