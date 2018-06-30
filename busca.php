<?php
include("php/conexao.php");
session_start();
?>
<html>
<head>
	<script src='Js/jquery-3.2.1.min.js'/></script>
	<script type="text/javascript" src="Js/coin-slider.js"></script>
	<link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>Rock For You</title>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta charset="utf-8">
</head>
<body onLoad="slide1()">
	<div id="interface">
		<?php
		include("php/conexao_menu_fixo.php");
		include("php/conexao_menu.php");
		include("php/conexao_banner.php");
		echo"	  <script type='text/javascript'>
		$(document).ready(function() {
			$('#coin-slider').coinslider({effect: 'random', navigation: true,width:$('#coin-slider').parent().width(),height:400, delay: 5000 });
		});
		</script>";
		$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
		$buscaprod = $_GET["buscaprod"];
		$sql = "SELECT * from produto WHERE nomeprod LIKE '%".$buscaprod."%' OR banda LIKE '%".$buscaprod."%'";
		$query = $mysqli->query($sql);
		$result = mysqli_num_rows($query);
		$registros = 20;
		$numPaginas = ceil($result/$registros);
		$inicio = ($registros*$pagina)-$registros;
		$sql = "SELECT * from produto WHERE nomeprod LIKE '%".$buscaprod."%' OR banda LIKE '%".$buscaprod."%' limit $inicio,$registros ";
		$query = $mysqli->query($sql);
		$result = mysqli_num_rows($query);
		if(Mysqli_num_rows($query) >= "1" & !empty($buscaprod)) {
			echo"<section id='produtos'>";
			echo " <span class='tituloprodutos'>" .$buscaprod."</span>";
			echo"</br>";
			echo"<div id='produtostotal'>";
			echo "Exibindo ".$result." resultados para <strong>".$buscaprod."</strong><br><br>";
			while($linha = mysqli_fetch_array($query)) {
				$db = mysqli_connect("localhost","root","","rock");
				$id = $linha["idprod"];
				$precototal = $linha['preco'] - ($linha['preco'] * ($linha['descontopor'] / 100 )) - $linha['descontosub'];
				$precov = number_format($precototal, 2, ',', ' ');
				echo "<a href='pagprod.php?id=$id'>";
      echo"<div class='proddiv'>
	  <div class='proddivimg'>
      <img src='upload/".$linha['imgprod']."'>
	  </div>";
      echo "<div class='proddiviinf'>
	  <p class='nomeprod'>" .$linha['nomeprod']."</p>";
      echo "<p class='precoprod'>R$ ".$precov."</p>
	  </div>";
      echo "</a>";
      echo "</div>";
			}
		} else {
			echo"<section id='produtos'>";
			echo "<span class='tituloprodutos'>Resultado</span></br>";
			echo"<div id='produtostotal'>";
			echo "Nao foi encontrado nenhum resultado para a sua pesquisa</strong>";
			echo "</section>";
		}
		echo"</div>";
		if ($numPaginas > 1){
			echo"<div class='container_arrow_pag'>";
			$n = $pagina;
			$a = $n-1;
			$p = $n+1;
			echo"<a class='arrow_pag' href='busca.php?buscaprod=".$buscaprod."&pagina=".$a."'><img src='img/pagback.png'/></a>";
			for($i = 1; $i < $numPaginas + 1; $i++) {
				echo "<a class='numpag' href='busca.php?buscaprod=".$buscaprod."&pagina=$i'>".$i."</a> ";
			}
			echo"<a class='arrow_pag' href='busca.php?buscaprod=".$buscaprod."&pagina=".$p."'><img src='img/pagfront.png'/></a>";
			echo "</div>";
		}
		echo"</div>";
		include("php/Footer.php");
		?>
	</body>
