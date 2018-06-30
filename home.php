
<?php
session_start();
?>
<?php
include("php/conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src='Js/jquery-3.2.1.min.js'/></script>
  <script type="text/javascript" src="Js/coin-slider.js"></script>
  <link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css" />
  <script src="Js/funcoes.js"></script>
  <title>Rock For You</title>
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
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
    ?>
	<div id="vitrine">
	<?php
		$sqlvitrine = "SELECT * FROM produto ORDER BY RAND() LIMIT 4";
		$queryvitrine = mysqli_query($db,$sqlvitrine);
		$i=1;
		while($vitrine = mysqli_fetch_array($queryvitrine)){
			$id=$vitrine['idprod'];
			 $precototal = $vitrine['preco'] - ($vitrine['preco'] * ($vitrine['descontopor'] / 100 )) - $vitrine['descontosub'];
              $precov = number_format($precototal, 2, ',', ' ');
			if($i==2){
				echo"<div id='expolateral'>";
			}
			echo"<div id='vitrineprod".$i."'>
			<a href='pagprod.php?id=$id'>
				<div class='vitrineimg".$i."'>
					<img class='vitrineimg1' src='upload/".$vitrine['imgprod']."'>
				</div>
				<div class='vitrineimg2".$i."'>
					<img class='vitrineimg1' src='upload/".$vitrine['imgprod2']."'>
				</div>
				<div class='vitrineinfo'>
					<p class='nomevitrine'>".$vitrine['nomeprod']."</p>";
					If(($vitrine['descontopor']>0) || ($vitrine['descontosub']>0)){
						echo"<p class='precovitrine' style='color: #969696;text-decoration: line-through;'>De R$:".number_format($vitrine['preco'], 2, ',', ' ')."&nbsp</p>
						<p class='precovitrine'>Por: R$:".$precov."</p>";
		}else{
		echo"<p class='precovitrine'>R$ ".$precov."</p>";}
		echo"<img class='faixavitrine'";If($i==2){echo"style='
    left: 0px;
		transform: rotatey(180deg);'";} echo"src='img/faixavitrine.png'>";
		If($vitrine['descontosub']>0){
						echo "<p class='descontovitrine'";If($i==2){echo"style='
						left: 5%;'";}echo">- R$".number_format($vitrine['descontosub'], 2, ',', ' ')."</p>";
					} else If($vitrine['descontopor']>0){
						echo "<p class='descontovitrine'";If($i==2){echo"style='
						left: 5%;'";}echo">- %".$vitrine['descontopor']."</p>";
					}
		echo"</div>
			</a>
			</div>";
			if($i==3){
				echo"</div>";
			}
			$i++;
		}
		echo"</div>";
		$sqlcategoria = "SELECT * FROM categoria ORDER BY RAND() LIMIT 10";
		$querycategoria = mysqli_query($db,$sqlcategoria);
		echo"<div id='vitrinecategorias'>
			<ul>";
		while($categoria = mysqli_fetch_array($querycategoria)){
		echo"<li style='background:url(upload/categoria/".$categoria['imagem'].");background-size: cover;'><a href='pagcat.php?cat=".$categoria['nomecat']."'><p>".$categoria['nomecat']."</p></a>
		</li>";
		
		}
		echo"</ul>
			</div>";
	?>
    <section id="produtos">
      <span class="tituloprodutos">Produtos:</span>
      <div class="produtostotal">
        <span>Novos Produtos:</span>
        <a class="botaodireito" href="javascript: void(0);" onclick="scrollDiv('l', 310, 1); return false;"><img src="img/thin_right_arrow_333.png"/></a>
        <a class="botaoesquerdo" href="javascript: void(0);" onclick="scrollDiv('r', 310, 1); return false;"><img src="img/thin_left_arrow_333.png"/></a>
        <div id="scroller1">
          <div id="inner-scroller">
            <?php
            $sql = "SELECT * FROM produto ORDER BY dataimg DESC Limit 6";
            $result = mysqli_query($db,$sql);
            while($row = mysqli_fetch_array($result)) {
              $id = $row["idprod"];
              $precototal = $row['preco'] - ($row['preco'] * ($row['descontopor'] / 100 )) - $row['descontosub'];
              $precov = number_format($precototal, 2, ',', ' ');
              echo "<a href='pagprod.php?id=$id'>";
      echo"<div class='proddiv'>
	  <div class='proddivimg'>
      <img src='upload/".$row['imgprod']."'>
	  </div>";
      echo "<div class='proddiviinf'>
	  <p class='nomeprod'>" .$row['nomeprod']."</p>";
      echo "<p class='precoprod'>R$ ".$precov."</p>
	  </div>";
      echo "</a>";
      echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="produtostotal">
        <span>Mais visualizados:</span>
        <a class="botaodireito" href="javascript: void(0);" onclick="scrollDiv('l', 310, 2); return false;"><img src="img/thin_right_arrow_333.png"/></a>
        <a class="botaoesquerdo" href="javascript: void(0);" onclick="scrollDiv('r', 310, 2); return false;"><img src="img/thin_left_arrow_333.png"/></a>
        <div id="scroller2">
          <div id="inner-scroller">
            <?php
            $sql = "SELECT * FROM produto ORDER BY visualizacoes DESC Limit 6";
            $result = mysqli_query($db,$sql);
            while($row = mysqli_fetch_array($result)) {
              $id = $row["idprod"];
              $precototal = $row['preco'] - ($row['preco'] * ($row['descontopor'] / 100 )) - $row['descontosub'];
              $precov = number_format($precototal, 2, ',', ' ');
             echo "<a href='pagprod.php?id=$id'>";
      echo"<div class='proddiv'>
	  <div class='proddivimg'>
      <img src='upload/".$row['imgprod']."'>
	  </div>";
      echo "<div class='proddiviinf'>
	  <p class='nomeprod'>" .$row['nomeprod']."</p>";
      echo "<p class='precoprod'>R$ ".$precov."</p>
	  </div>";
      echo "</a>";
      echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php
  include("php/Footer.php");
  ?>
</body>
</html>
