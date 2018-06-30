<?php
include("php/conexao.php");
session_start();

if(!isset($_SESSION['carrinho'])){
	$_SESSION['carrinho'] = array();
}
//adiciona produto
if(isset($_GET['acao'])){
	//REMOVER CARRINHO
	if($_GET['acao'] == 'del'){
		$indice = $_GET['indice'];
		if(isset($_SESSION['carrinho'][$indice])){
			unset($_SESSION['carrinho'][$indice]);
		}
	}
}
if(isset($_POST['acao'])){
	//ADICIONAR CARRINHO
	if(($_POST['acao'] == 'add')){
		$id = intval($_POST['id']);
		$cor = $_POST['cor'];
		$tamanho = $_POST['tamanho'];
		$indice = sprintf('%s:%s:%s', $id, $cor, $tamanho);
		if(!isset($_SESSION['carrinho'][$indice])){
			$_SESSION['carrinho'][$indice] = 1;
		}
	}
	//ALTERAR QUANTIDADE
	if($_POST['acao'] == 'up'){
		foreach($_POST['qtd'] as $indice => $qtd){
			if(isset($_SESSION['carrinho'][$indice])){
				if(!empty($qtd) || $qtd <> 0){
					$_SESSION['carrinho'][$indice] = $qtd;
				}else{
					unset($_SESSION['carrinho'][$indice]);
				}
			}
		}
	}
}
?>
<head>
	<script language="javascript" src="Js/ajax.js"></script>
	<script language="javascript" src="Js/calculoFrete.js"></script>
	<script src='Js/jquery-3.2.1.min.js'/></script>
	<script type="text/javascript" src="Js/coin-slider.js"></script>
	<link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css" />
	<script src="Js/funcoes.js"></script>
	<title>Rock For You</title>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body onLoad="slide1()">
	<div id="interface">
		<?php
		include("php/conexao_menu_fixo.php");
		include("php/conexao_menu.php");
		include("php/conexao_banner.php");
		echo"<script type='text/javascript'>
		$(document).ready(function() {
			$('#coin-slider').coinslider({effect: 'random', navigation: true,width:$('#coin-slider').parent().width(),height:400, delay: 5000 });
		});
		</script>";
		?>
		<section id="container-carrinho">
			<span class="tituloprodutos">Carrinho de Compras</span>
			<table id="carrinho">
				<form action="" method="post">
					<input type='hidden' name='acao' value='up'>

					<tbody>
						<?php
						if(count($_SESSION['carrinho']) == 0){
							echo '<tr><td colspan="5" style="font-weight: bold; font-size: 20px; display: table; margin: auto;">Não há produtos no carrinho</td></tr>';
						}else{
							echo" <thead>
							<tr>
							<th width='40%'>Produto</th>
							<th width='10%'>Cor</th>
							<th width='10%'>Tamanho</th>
							<th width='10%'>Quantidade</th>
							<th width='10%'>Pre&ccedil;o</th>
							<th width='10%'>SubTotal</th>
							<th width='10%'>Remover</th>
							</tr>
							</thead>";
							require("php/conexao.php");
							$total = 0;
							$td = 0;
							foreach($_SESSION['carrinho'] as $indice => $qtd){
								switch ($td) {
									case 0:
									$td= 1;
									break;
									case 1:
									$td= 2;
									break;
									case 2:
									$td= 1;
									break;
								}
								list($id, $cor, $tamanho)      = explode(':', $indice);
								$sql   = "SELECT *  FROM produto WHERE idprod= '$id'";
								$query = $mysqli->query($sql)or die(mysql_error());

								$ln = mysqli_fetch_array($query);

								$nome  = $ln['nomeprod'];
								$precototal = $ln['preco'] - ($ln['preco'] * ($ln['descontopor'] / 100 )) - $ln['descontosub'];
								$preco = number_format( $precototal, 2, ',', '.');
								$sub   = number_format($precototal * $qtd, 2, ',', '.');

								$total += $ln['preco'] * $qtd;
								echo "
								<tr>
								<td class='td_carrinho_".$td."'><tl><div class='foto_carrinho'><img src='upload/".$ln['imgprod']."'></div></tl>
								<tl class='nome_prod_carrinho'>".$nome."</tl></td>
								<td class='td_carrinho_".$td."'>".$cor."</td>
								<td class='td_carrinho_".$td."'>".$tamanho."</td>
								<td class='td_carrinho_".$td."'><input type='number' size='3' style='width: 30px;' name='qtd[".$indice."]' value='".$qtd."' /></td>
								<td class='td_carrinho_".$td."'>R$ ".$preco."</td>
								<td class='td_carrinho_".$td."'>R$ ".$sub."</td>
								<td class='td_carrinho_".$td."'><a style='width:50%; height:50%;' href='?acao=del&indice=".$indice."'><img style='width:30%;' src='img/x.png'/></a></td>
								</tr>";
							}
							$peso = $qtd*0.2;
							if($peso<1){
								$peso=1;
							}
							$totalf = number_format($total, 2, ',', '.');
							echo "
							<tfoot>
							<tr id='trbot'>
							<td style='display: table-cell; text-align: center;'>
							CEP Destino:
							<input name='cepDestino' type='text' id='cepDestino'>
							<input name='valor' type='hidden' value='".$totalf."' id='valor'>
							<input name='peso' type='hidden' value='".$peso."' id='peso'>
							<input name='postok' type='button' id='postok' value='Calcular' onClick='calculoFrete();'>
							</td>
							<td  style='color: #FFF;font-size: 20px;'>= R$ <input class='texto' name='valorfrete' value='' id='result' style='width: 50%;color: #FFF;border:none;font-size: 20px;' readonly='readonly'></td>
							<td></td>
							<td></td>
							<td style='float: right;'>Total: <p>R$<p></td>
							<td><input name='valortotal' value='".$totalf."' id='valortotal' style='border:none' readonly='readonly'></td>
							<td>
							<input type='submit' class='atualizar' value='Atualizar Carrinho'/>
							</td>
							</tr>
							</tfoot>";
						}
						if(isset($_POST['enviar'])){
							if(!isset($_SESSION["Usuarioemail"]) ||!isset($_SESSION["Usuariosenha"])|| $_SESSION["UsuarioNivel"]== 1 ) {
								header("Location:home.php");
								exit;
							}else{
								$frete = $_POST['valorfrete'];
								$valorfrete = str_replace(',', '.',$frete);
								$cep = $_POST['cep'];
								$idcliente = $_SESSION['UsuarioID'];
								$idvenda = strtoupper($idcliente.uniqid());
								$data = date('Y/m/d');
								$sqlvenda="INSERT INTO `pedido` (`id`, `valor`, `data`, `idcliente`, `frete`, `cep`)
								VALUES ('$idvenda', '$total', '$data', '$idcliente','$valorfrete', '$cep')";
								$queryvenda = $mysqli->query($sqlvenda);
								foreach($_SESSION['carrinho'] as $indice => $qtd){
									list($id, $cor, $tamanho)      = explode(':', $indice);
									$sqlinsert   = "SELECT *  FROM produto WHERE idprod= '$id'";
									$queryinsert = $mysqli->query($sqlinsert)or die(mysql_error());
									$lninsert = mysqli_fetch_array($queryinsert);
									$nomeinsert  = $lninsert['nomeprod'];
									$adicionavisu = mysqli_query($db,"UPDATE estoque SET quantidade = quantidade - $qtd WHERE Nome='$nomeinsert' and Tamanho='$tamanho' and Cor='$cor'");
									$precototalinsert = $lninsert['preco'] - ($lninsert['preco'] * ($lninsert['descontopor'] / 100 )) - $lninsert['descontosub'];
									$precoinsert = number_format( $precototalinsert, 2, ',', '.');
									$sqlitens="INSERT INTO `itens-pedido` (`id-prod`, `quantidade`, `cor`, `idpedido`, `tamanho`, `nome`, `preco`)
									VALUES ('$id', '$qtd', '$cor', '$idvenda', '$tamanho', '$nomeinsert', '$precoinsert')";
									$queryitens = $mysqli->query($sqlitens);
								}
								echo"<script>window.location='finalizarpedido.php?idpedido=".$idvenda."'</script>";
							}
						}
						?>
					</form>
				</table>
				<div id="container_acoes">
					<?php
					if(count($_SESSION['carrinho']) > 0){
						echo'
						<form action="" enctype="multipart/form-data" method="post">
						<input type="hidden" value="" name="valorfrete" id="valorfrete">
						<input type="hidden" value="" name="cep" id="cep">
						<input type="submit" class="acoescarrinho" name="enviar" value="Finalizar compra">
						</form>';
					}
					?>
					<div>
						<a class="continuar" href="home.php">Continuar Comprando</a>
					</div>
				</div>
			</section>
		</div>
		<?php
		include("php/Footer.php");
		?>
	</body>
	</html>
