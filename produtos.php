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
	<title>Criação de produtos</title>
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
			<div id="aside">
				<form id="form1" name="form1" method="post" enctype="multipart/form-data" style="padding:50px" action="php/salvarprod.php">
					<Legend><center><h2>Cadastro de Produtos</h2></center></Legend>
				</br>
				<table width="390" border="0" align="center">
					<td>Nome</td>
					<td><input name="nomeprod" type="text" id="nomeprod" required ></td>
					<tr>
						<td>Preço</td>
						<td><input name="preco" type="text" id="preco" required ></td>
					</tr>
					<tr>
						<td>Desconto Porcentagem</td>
						<td><input name="descontopor" type="text" id="desconto" >%</td>
					</tr>
					<tr>
						<td>Desconto R$</td>
						<td><input name="descontosub" type="text" id="desconto" ></td>
					</tr>
					<tr>
						<td>Imagem</td>
						<td><input name="imgprod" type="file" required id="imgprod"></td>
					</tr>
					<tr>
						<td>Imagem 2</td>
						<td><input name="imgprod2" type="file" id="imgprod2"></td>
					</tr>
					<tr>
						<td>Imagem 3</td>
						<td><input name="imgprod3" type="file" id="imgprod3"></td>
					</tr>
					<tr>
						<td>Imagem 4</td>
						<td><input name="imgprod4" type="file" id="imgprod4"></td>
					</tr>
					<tr>
						<td>Imagem 5</td>
						<td><input name="imgprod5" type="file" id="imgprod5"></td>
					</tr>
					<tr>
						<td>Categoria</td>
						<td>
							<select name="categoria">
								<option value="Categoria">Selecione a Categoria</option>
								<?php
								$sql = "SELECT * FROM categoria";
								$result = mysqli_query($db,$sql);
								while($row = mysqli_fetch_array($result)) {
									echo "<option value=".$row['nomecat'].">".$row['nomecat']."</option>";
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Banda</td>
							<td><input name="banda" type="text"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Salvar" style="cursor:pointer"/></td>
						</tr>
					</table>
				</form>
				<form id="form1" name="form1" method="post" style="padding:50px" enctype="multipart/form-data" action="php/salvarcad.php">
					<legend><h2>Criar Categoria</h2></legend>
				</br>
				<table width="390" border="0" align="center">
					<tr>
						<td>Nome Categoria</td>
						<td><input name="nomecat" type="text" id="nomecad" /></td>
					</tr>
					<tr>
						<td>Tipo</td>
						<td>
							<input name="tipocat" type="radio" value="roupas" checked="checked" />
							Roupas
							<input name="tipocat" type="radio" value="acessorios" />
							Acessorios
							<input name="tipocat" type="radio" value="produtos" />
							Produtos
						</td>
					</tr>
						<tr>
							<td>Imagem Categoria</td>
							<td><input name="imgcat" type="file" id="imgprod5"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Cadastrar" style="cursor:pointer"/></td>
						</tr>
					</tr>
				</table>
			</form>
		</div id="aside">
		<div id="principal">
			<table id="tabela_produtos" width="500" align="center">
				<tr align="center">
					<th colspan="100%" style="border: none;"><h2>Lista de Produtos</h2></th>
				</tr>
				<tr>
					<th>ID </th>
					<th>NOME</th>
					<th>Preço</th>
					<th>Desconto R$</th>
					<th>Desconto Porcentagem</th>
					<th>Categoria</th>
					<th>EDITAR/EXCLUIR</th>
				</tr>
				<?php
				$sql2 = "select * from produto";
				$query = $mysqli->query($sql2);
				while($L = mysqli_fetch_array($query)) {
					$id     = $L ["idprod"];
					$nomeprod   = $L["nomeprod"];
					$preco    = $L["preco"];
					$descontosub    = $L["descontosub"];
					$descontopor    = $L["descontopor"];
					$categoria    = $L["categoria"];
					echo"
					<tr border=2>
					<td>$id</td>
					<td>$nomeprod</td>
					<td>$preco</td>
					<td>$descontosub</td>
					<td>$descontopor</td>
					<td>$categoria</td>
					<td><a href=\"editarprod.php?id=$id\">[Editar]</a> |
					<a href=\"php/excluir.php?id=$id\">[Excluir]</a></td>
					</tr>\n";
				}
				?>
			</table>
		</div>
	</div>
</div>
<?php include("php/Footer.php"); ?>
</body>
</html>
