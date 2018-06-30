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
	<title>Estoque de produtos</title>
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
			<form id="form1" name="form1" method="post" enctype="multipart/form-data" style="padding:25px 50px 10px 50px" action="php/salvarestoque.php">
				<Legend><center><h2>Cadastro</h2></center></Legend>
			</br>
			<table width="390" border="0" align="center">
				<td>Nome</td>
				<td><select name="nomeprod">
						<option value="nomeprod">Selecione o Produto</option>
						<?php
						$sql = "SELECT * FROM produto";
						$result = mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result)) {
							echo "<option value=".$row['nomeprod'].">".$row['nomeprod']."</option>";
						}
						?>
						</td>
				<td>Tamanho</td>
				<td>
					<select name="tamanho">
						<option value="tamanho">Selecione o Tamanho</option>
						<?php
						$sql = "SELECT * FROM tamanhos";
						$result = mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result)) {
							echo "<option value=".$row['Tamanho'].">".$row['Tamanho']."</option>";
						}
						?>
					</td>
					<td>cor</td>
					<td><select name="cor" type="text" id="cor" required >
						<option value="Preto">Preto</option>
						<option value="Branco">Branco</option>
						<option value="Rosa">Rosa</option>
						<option value="Azul">Azul</option>
						<option value="Verde">Verde</option>
						<option value="Amarelo">Amarelo</option>
						<option value="Vermelho">Vermelho</option>
						<option value="Laranja">Laranja</option>
						<option value="Roxo">Roxo</option>
						<option value="Cinza">Cinza</option>
					<td>Quantidade</td>
					<td><input name="quantidade" type="number" id="quant" required ></td>
					<td>&nbsp;</td>
					<td><input type="submit" name="Submit" value="Salvar" style="cursor:pointer"/></td>
				</table>
			</form>
			<form id="form1" name="form1" method="post" style="padding:0px 50px 25px 50px" action="php/salvartamanho.php">
				<legend><center><h2>Cadastrar tamanho</h2></center></legend>
			</br>
			<table border="0" align="center" style=" margin: auto;">
				<td>Tamanho</td>
				<td><input name="nometamanho" type="text" id="nometamanho"></td>
				<td><input type="submit" name="Submit" value="Cadastrar" style="cursor:pointer"/></td>
			</table>
		</form>
		<table id="tabela_estoque" width="100%" align="center">
			<tr align="center">
				<th colspan="100%" style="border: none;"><h2>Lista de Produtos</h2></th>
			</tr>
			<tr>
				<th>ID </th>
				<th>NOME</th>
				<th>Cor</th>
				<th>Tamanho</th>
				<th>Quantidade</th>
				<th>Excluir/Salvar</th>
			</tr>
			<?php
			$sql2 = "select * from estoque";
			$query = $mysqli->query($sql2);
			while($L = mysqli_fetch_array($query)) {
				$id     = $L ["Id"];
				$nomeprod   = $L["Nome"];
				$cor    = $L["Cor"];
				$tamanho    = $L["Tamanho"] ;
				$quant = $L["Quantidade"];		
				echo"
				<form method='post' action='php/atualizarestoque.php'>
				<td><input name='id' type='hidden' value='$id'></td>
				<tr border=2>
				<td>$id</td>
				<td>$nomeprod</td>
				<td>$cor</td>
				<td>$tamanho</td>
				<td><input type='text' size='3' name='quant' value='".$quant."' /></td>
				<td><a href=\"php/excluirestoque.php?id=$id\">[Excluir]</a> |
				<input type='submit' value='Atualizar' /></td>
				</td>
				</tr>\n";
			}
			?>
		</table>
	</form>
</div>
</div>
<?php include("php/Footer.php"); ?>
</body>
</html>
