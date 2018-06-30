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
	<title>Ingressos</title>
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
				<form id="form1" name="form1" method="post" enctype="multipart/form-data" style="padding:50px" action="php/salvaringresso.php">
					<Legend><center><h2>Cadastro</h2></center></Legend>
				</br>
				<table width="390" border="0" align="center">
					<tr>
						<td>Nome</td>
						<td><input name="nome" type="text" id="nome" required ></td>
					</tr>
					<tr>
						<td>Descrição</td>
						<td><input name="descricao" type="text" id="descricão" required ></td>
					</tr>
					<tr>
						<td>Preço</td>
						<td><input name="preco" type="text" id="preco" required ></td>
					</tr>
					<tr>
						<td>Local</td>
						<td><input name="local" type="text" id="local" required ></td>
					</tr>
					<tr>
						<td>Banda</td>
						<td><input name="banda" type="text" id="banda"></td>
					</tr>
					<tr>
						<td>Data</td>
						<td><input name="data" type="date" id="data" required ></td>
					</tr>
					<tr>
						<td>hora</td>
						<td><input name="hora" type="time" id="hora" required ></td>
					</tr>
					<tr>
						<td>Imagem</td>
						<td><input name="imgprod" type="file" required id="imgprod"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="Submit" value="Enviar" style="cursor:pointer"/></td>
					</tr>
				</table>
			</form>
		</div id="aside">
		<div id="principal">
			<table id="tabela_produtos" width="500" align="center">
				<tr align="center">
					<th colspan="100%" style="border: none;"><h2>Lista de Ingressos</h2></th>
				</tr>
				<tr>
					<th>ID </th>
					<th>NOME</th>
					<th>Descrição</th>
					<th>Preço</th>
					<th>EDITAR/EXCLUIR</th>
				</tr>
				<?php
				$sql2 = "select * from ingressos";
				$query = $mysqli->query($sql2);
				while($L = mysqli_fetch_array($query)) {
					$id     = $L ["id"];
					$nome  = $L["nome"];
					$descricao   = $L["descricao"];
					$preco    = $L["preco"];
					echo"
					<tr border=2>
					<td>$id</td>
					<td>$nome</td>
					<td>$descricao</td>
					<td>$preco</td>
					<td><a href=\"php/editaringresso.php?id=$id\">[Editar]</a> |
					<a href=\"php/excluiringresso.php?id=$id\">[Excluir]</a></td>
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
