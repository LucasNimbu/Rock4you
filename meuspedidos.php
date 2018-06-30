<?php
include("php/conexao.php");
session_start();
?>
<html>
<head>
<script language="javascript" src="Js/ajax.js"></script>
<script language="javascript" src="Js/calculoFrete.js"></script>
<script src='Js/jquery-3.2.1.min.js'/></script>
    <script src="Js/funcoes.js"></script>
    <title>Rock For You</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
		<section id="container-carrinho">
			<span class='tituloprodutos'>Meus Pedidos:</span>
			<?php
			$sql= "SELECT * FROM `pedido` WHERE idcliente='".$_SESSION['UsuarioID']."'";
			$query = mysqli_query($db,$sql);
			while($pedido = mysqli_fetch_array($query)){
				$valor = $pedido['valor'];
				echo"<div id='headerpedidos'>
				<ul>
				<p>Código pedido: ".$pedido['id']."</p>
				<p>Valor: ".$valor."</p>
				<p>Situação do pedido: ".$pedido['situacao']."</p>
				</ul>
				</div>
				<table id='pedidos'>
				<thead>
				<tr>
				<th width='40%'>Produto</th>
				<th width='15%'>Cor</th>
				<th width='15%'>Tamanho</th>
				<th width='15%'>Quantidade</th>
				<th width='15%'>Pre&ccedil;o</th>
				</tr>
				</thead>";
				$sql1= "select * from `itens-pedido` where `idpedido`='".$pedido['id']."'";
				$query2 = mysqli_query($db,$sql1);
				$td = 0;
				while($row = mysqli_fetch_array($query2)){
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
					echo "<tr>";
					$id = $row['id-prod'];
					$sql3  = "SELECT *  FROM produto WHERE idprod= '$id'";
					$query3 = $mysqli->query($sql3)or die(mysql_error());
					$ln = mysqli_fetch_array($query3);
					echo"<td class='td_carrinho_".$td."'><tl><div class='foto_carrinho'><img src='upload/".$ln['imgprod']."'></div></tl>
					<tl>".$row['nome']."</tl></td>
					<td class='td_carrinho_".$td."'>".$row['cor']."</td>
					<td class='td_carrinho_".$td."'>".$row['tamanho']."</td>
					<td class='td_carrinho_".$td."'>".$row['quantidade']."</td>
					<td class='td_carrinho_".$td."'>R$ ".$row['preco']."</td>
					</tr>
					<tfoot>
						<tr id='trbot'>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
						<td>&nbsp</td>
					</tfoot>";
				}
				$td = 0;
			}
			?>
		</table>
	</section>
</div>
<?php
include("php/Footer.php");
?>
</body>
</html>
