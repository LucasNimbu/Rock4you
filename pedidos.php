<?php
include("php/conexao.php");
session_start();
if(!isset($_SESSION["Usuarioemail"]) ||!isset($_SESSION["Usuariosenha"])|| $_SESSION["UsuarioNivel"]== 1 ) {
	header("Location:home.php");
	exit;
}
?>
<html>
<head>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta charset="utf-8">
	<title>Pedidos</title>
</head>
<?php
include("php/conexao.php");
?>
<body>
	<div id="interface">
		<?php
		include("php/conexao_menu.php");
		?>
		<div class="Fundo_cadprod">
			<?php
			$sql= "SELECT * FROM `pedido`";
			$query = mysqli_query($db,$sql);
			while($pedido = mysqli_fetch_array($query)){
				$valor = $pedido['valor'];
				echo"<table width='988' border='0' cellspacing='0' cellpadding='0'>
				<tr>
				<td>
				<th><div>Código pedido: ".$pedido['id']."</div></th>
				<th><div>Valor: ".$valor."</div></th>
				<th><div>Situação do pedido: ".$pedido['situacao']."</div></th>
				</td>
				</tr>
				<tr>
				<th width='244'>Produto</th>
				<th width='100'>Cor</th>
				<th width='20'>Tamanho</th>
				<th width='79'>Quantidade</th>
				<th width='89'>Preço</th>
				</tr>";
				$sql1= "select * from `itens-pedido` where `idpedido`='".$pedido['id']."'";
				$query2 = $mysqli->query($sql1);
				while($row = mysqli_fetch_array($query2)){
					echo "<tr>
					<div>";
					$id = $row['id-prod'];
					$sql  = "SELECT *  FROM produto WHERE idprod= '$id'";
					$query = $mysqli->query($sql)or die(mysql_error());
					$ln = mysqli_fetch_array($query);
					echo"<td>".$row['nome']."</td>
					<td>".$row['cor']."</td>
					<td>".$row['tamanho']."</td>
					<td>".$row['quantidade']."</td>
					<td>R$ ".$row['preco']."</td>
					</div>
					</tr>";
				}
			};
			?>
		</table>
	</div>
</div>
<?php include("php/Footer.php"); ?>
</body>
</html>
