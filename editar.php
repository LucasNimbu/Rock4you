<?php
include("php/conexao.php");
session_start();
if(!isset($_SESSION["Usuarioemail"]) ||!isset($_SESSION["Usuariosenha"])|| $_SESSION["UsuarioNivel"]== 1 ) {
	header("Location:home.php");
	exit;
}
?>
<?php
include("php/conexao.php");
$id = $_GET['id'];
settype($id, "integer");
$sql = "select * from usuarios where iduser = $id";
$query = $mysqli->query($sql);
$dados  = mysqli_fetch_array($query);
if($dados["sexo"] == "M") {
	$checkedM   = "checked=\"checked\"";
	$checkedF   = "";
} else {
	$checkedM    = "";
	$checkedF   = "checked=\"checked\"";
}
if($dados["nivel"] == "1") {
	$checked1   = "checked=\"checked\"";
	$checked2   = "";
} else {
	$checked1   = "";
	$checked2   = "checked=\"checked\"";
}
$mysqli->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>Cadastro</title>
</head>
<body onLoad="slide1()">
	<div id="interface">
		<?php
		include("php/conexao_menu_fixo.php");
		include("php/conexao_menu.php");
		?>
		<div class="Fundo_cadprod">
			<form id="form1" name="form1" method="post" action="php/salvar_edicao.php">
				<input type="hidden" input name="id" id="id" value="<?php echo $id;?>" />
				<h2 align="center"><strong>Edicao de Usuarios </strong></h2>
				<table width="390" border="1" align="center">
					<td width="165">Nome</td>
					<td width="209"><input name="nome" type="text" id="nome" value="<?php echo $dados["nome"];?>" /></td>
				</tr>
				<tr>
					<td>Sobrenome</td>
					<td><input name="sobrenome" type="text" id="sobrenome" value="<?php echo $dados["sobrenome"];?>" /></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input name="email" type="text" id="email" value="<?php echo $dados["email"];?>" /></td>
				</tr>
				<tr>
					<td>Sexo</td>
					<td><input name="sexo" type="radio" value="M" <?php echo $checkedM;?> />
						Masculino
						<input name="sexo" type="radio" value="F" <?php echo $checkedF;?> />
						Feminino </td>
						<tr>
							<td>Telefone</td>
							<td><input name="telefone" type="text" id="telefone" value="<?php echo $dados["telefone"];?>" /></td>
						</tr>
						<tr>
							<td>Data de Nascimento</td>
							<td><input name="nasc" type="text" id="nasc" value="<?php echo $dados["nasc"];?>" /></td>
						</tr>
						<td>Nivel</td>
						<td><input name="nivel" type="radio" value="1" <?php echo $checked1;?> />
							Cliente
							<input name="nivel" type="radio" value="2" <?php echo $checked2;?> />
							ADM </td>
							<tr>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" name="Submit" value="Gravar" style="cursor:pointer"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<?php include("php/Footer.php"); ?>
		</body>
		</html>
