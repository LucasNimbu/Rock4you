<!DOCTYPE html>
<html>
<head>
  <script src='Js/jquery-3.2.1.min.js'></script>
  <script src='Js/jquery.elevateZoom-3.0.8.min.js'></script>
  <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
  <script src="Js/modernizr.custom.17475.js"></script>
  <?php
  session_start();
  include("php/conexao.php");
  $id = $_GET["id"];
  settype($id, "integer");
  $sql = "select * from produto where idprod = $id";
  $adicionavisu = mysqli_query($db,"UPDATE produto SET visualizacoes = visualizacoes + 1 WHERE idprod='$id'");
  $query = $mysqli->query($sql);
  $dados  = mysqli_fetch_array($query);
  $precototal = $dados['preco'] - ($dados['preco'] * ($dados['descontopor'] / 100 )) - $dados['descontosub'];
  $precoprod = number_format($precototal, 2, ',', ' ');
  $banda = $dados['banda'];
  echo"<meta charset='utf-8'>
  <link rel='shortcut icon' href='img/favicon.ico'>
  <link rel='stylesheet' type='text/css' href='css/style.css'>
  <link rel='stylesheet' type='text/css' href='css/pagprod.css'>
  <title>Rock For You</title>
  </head>
  <body>
  <div id='interface'>";
  include("php/conexao_menu.php");
  echo"<div id='pag_produto'>";
  echo "<div id='foto_prod'>
  <aside>
  <div id='gal'>
  ";
  if(!empty($dados['imgprod'])){
    $imgprod=$dados['nomeprod'];
    echo"<a href='' data-image='upload/".$dados['imgprod']."' data-zoom-image='upload/large/".$dados['imgprod']."'>
    <img id='img_01' src='upload/".$dados['imgprod']."' />
    </a>";
  };
  if(!empty($dados['imgprod2'])){
    echo"<a href='' data-image='upload/".$dados['imgprod2']."' data-zoom-image='upload/large/".$dados['imgprod2']."'>
    <img id='img_01' src='upload/".$dados['imgprod2']."' />
    </a>";
  };
  if(!empty($dados['imgprod3'])){
    echo"<a href='' data-image='upload/".$dados['imgprod3']."' data-zoom-image='upload/large/".$dados['imgprod3']."'>
    <img id='img_01' src='upload/".$dados['imgprod3']."' />
    </a>";
  };
  if(!empty($dados['imgprod4'])){
    echo"<a href='' data-image='upload/".$dados['imgprod4']."' data-zoom-image='upload/large/".$dados['imgprod4']."'>
    <img id='img_01' src='upload/".$dados['imgprod4']."' />
    </a>";
  };
  if(!empty($dados['imgprod5'])){
    echo"<a href='' data-image='upload/".$dados['imgprod5']."' data-zoom-image='upload/large/".$dados['imgprod5']."'>
    <img id='img_01' src='upload/".$dados['imgprod5']."' />
    </a>";
  };
  echo"</aside>
  <section><img id='img_troca' src='upload/".$dados['imgprod']."' data-zoom-image='upload/large/".$dados['imgprod']."'/></section></div>";
  echo "<div id='pagprod_descricao'>
  <form action='carrinho.php' method='post' novalidate='novalidate' accept-charset='UTF-8'>
  <input type='hidden' name='id' value='".$_GET['id']."'>
  <input type='hidden' name='acao' value='add'>
  <p class='pag_nomeprod'>" .$dados['nomeprod']."</p>";
  echo "</br>";
  echo"<div id='div_preço'><p style='display:inline;'>Preço: </p>";
  echo"<div style='display:inline-table'>";
  If($dados['descontopor']>1 || $dados['descontosub']>1){
    echo "<p style='color: #969696;text-decoration: line-through;display:inline-table;'>De: R$ " .$dados['preco']."</p>";
    echo "<p style='display:inline-table' class='pag_precoprod'>&nbsp Por: R$ " .$precoprod."</p>";
  }
  Else{
    echo "<p class='pag_precoprod'> R$ " .$dados['preco']."</p>";
  }
  echo"</div>";
  echo"</div>";
  echo "</br>";
  $sql2 = "SELECT DISTINCT Tamanho from estoque where Nome='".$dados['nomeprod']."' And Quantidade > 0";
  $query2 = $mysqli->query($sql2);
  If(Mysqli_num_rows($query2)>0){
    echo"<div id='pagprod_tamanho'>
    <span>Selecione o Tamanho:</span></br>";
	$t=1;
    while($row = mysqli_fetch_array($query2)) {
      $tamanho = $row['Tamanho'];
      echo" <input type='radio' name='tamanho' value='".$tamanho."' id='".$tamanho."'"; if($t==1){echo"checked='true'";} echo">
      <label for='".$tamanho."'><p>$tamanho</p></label>";
	  $t++;
    }
    echo"</div>";
  }
  $sql3 = "SELECT DISTINCT Cor from estoque where Nome='".$dados['nomeprod']."' And Quantidade > 0";
  $query3 = $mysqli->query($sql3);
  If(Mysqli_num_rows($query3)>0){
    echo"<div id='pagprod_cor'>
    <span>Selecione a Cor:</span></br>";
	$i=1;
    while($row = mysqli_fetch_array($query3)) {
      $cor = $row['Cor'];
      switch ($cor) {
        case "Preto":
        $cor="#000";
        break;
        case "Branco":
        $cor="#FFF";
        break;
        case "Rosa":
        $cor="#FA58F4";
        break;
        case "Azul":
        $cor="#0101DF";
        break;
        case "Verde":
        $cor="#01DF01";
        break;
        case "Amarelo":
        $cor="#FFFF00";
        break;
        case "Vermelho":
        $cor="#B40404";
        break;
        case "Laranja":
        $cor="#FF8000";
        break;
        case "Roxo":
        $cor="#7401DF";
        break;
        case "Cinza":
        $cor="#BDBDBD";
        break;
      }
      echo" <input type='radio' name='cor' value='".$row['Cor']."' id='".$cor."'>
      <label for='".$cor."' style='background-color:".$cor.";'"; if($i==1){echo"checked='true'";} echo"><p>&nbsp</p></label>";
	  $i++;
    }
    echo"</div>";
  }
  echo "</br>";
  echo "</br>";
  $sql4 = "SELECT SUM(Quantidade) from estoque where Nome='".$dados['nomeprod']."'";
  $query4 = $mysqli->query($sql4);
  $sum = mysqli_fetch_array($query4);
  $quantidade=$sum['SUM(Quantidade)'];
  If($quantidade>0){
    echo '<ul id=compra_carrinho_botao>
    <li><button type="submit" value="submit" id="botaocarrinho"><p>Adicionar ao Carrinho</p></a><li>
    </ul>';
  }else{
    echo"<div id='produto_indisponivel'><img src='img/Produto indisponível.png'/></div>";
  }
  ?>
</form>
</div>
</div>
</div>
	<p id="titulocarousel"> Produtos Semelhantes </p>
<ul id="carousel" class="elastislide-list">
	<?php
	$categoria=$dados['categoria'];
	$sqlsemelhante="SELECT * from produto where idprod <> $id and (categoria='$categoria' or banda='$banda')";
	$querysemelhante=mysqli_query($db,$sqlsemelhante);
	while($semelhante=mysqli_fetch_array($querysemelhante)){
		$id=$semelhante['idprod'];
				echo"<li><a href='pagprod.php?id=".$id."'><img src='upload/".$semelhante['imgprod']."'/></a></li>";
	}
	?>
</ul>
		<script type="text/javascript" src="Js/jquerypp.custom.js"></script>
		<script type="text/javascript" src="Js/jquery.elastislide.js"></script>
		<script type="text/javascript">
			
			$( '#carousel' ).elastislide();
			
		</script>
<?php include("php/Footer.php"); ?>
<script>
$("#img_troca").elevateZoom({gallery:'gal', cursor: 'pointer', galleryActiveClass: 'active',
zoomType				: "lens",
lensShape : "round",
lensSize    : 200,
imageCrossfade: true,
loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'});
$("#img_troca").bind("click", function(e) {
  var ez =   $('#img_troca').data('elevateZoom');
  $.fancybox(ez.getGalleryList());
  return false;
});
</script>
</body>
</html>
