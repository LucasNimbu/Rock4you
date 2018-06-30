<?php
include("php/conexao.php");
session_start();
if(!isset($_SESSION["Usuarioemail"]) ||!isset($_SESSION["Usuariosenha"])|| $_SESSION["UsuarioNivel"]== 1 ) {
	header("Location:home.php");
	exit;
}
if(isset($_GET["acao"])){
	$id= $_GET['id'];
	$sql = "delete from banner where id = $id";
	$query = $mysqli->query($sql);
}
?>
<?php
include("php/conexao.php");
?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../../css/style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>Mudar Banner</title>
</head>
<body>
	<div id="interface">
		<?php
		include('php/conexao_menu.php');
		?>
		<div class="Fundo_cadprod">
		<div id="aside">
				<form id="form1" name="form1" method="post" enctype="multipart/form-data" style="padding:50px" action="php/salvarbanner.php">
					<Legend><center><h2>Adicionar Banners</h2></center></Legend>
				</br>
				<table width="390" border="0" align="center">
					<td>Link</td>
					<td><input name="link" type="text" id="link"></td>
					<tr>
						<td>Imagem</td>
						<td><input name="imgcaminho" type="file" required id="imgprod"></td>
					</tr>

					</table>
					<tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Salvar" style="cursor:pointer"/></td>
						</tr>
				</form>
</div>
<div id="principal">
			<table id="tabela_produtos" width="700" align="center">
				<tr align="center">
					<th colspan="100%" style="border: none;"><h2>Banners</h2></th>
				</tr>
				<tr>
					<th>ID </th>
					<th>Imagem</th>
					<th>Link</th>
					<th>EDITAR/EXCLUIR</th>
				</tr>
				<?php
				$sql2 = "select * from banner";
				$query = $mysqli->query($sql2);
				while($L = mysqli_fetch_array($query)) {
					$id     = $L ["id"];
					$link  = $L["link"];
					$img   = $L["imgcaminho"];
					echo"
					<tr border=2>
					<td>$id</td>
					<td>$img</td>
					<td>$link</td>
					<td>
					<a href='banner.php?id=$id&acao=del'>[Excluir]</a></td>
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
