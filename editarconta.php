<?php
include("php/conexao.php");
session_start();
$id = $_SESSION['UsuarioID'];
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
<body>
	<div id="interface">
		<?php
		include('php/conexao_menu.php');
		?>
		<div class="Fundo_cadprod">
			<form id="form1" name="form1" method="post" action="php/salvareditconta.php">
				<input type="hidden" input name="id" id="id" value="<?php echo $id;?>" />
				<h2 align="center" style="font-size: 30px; font-weight: bold; color: #820101;"><strong>Editar Conta </strong></h2>
				<table width="390" border="0" align="center" style="margin: 20px 0;">
					<tbody><tr><td width="165">Nome</td>
						<td width="209"><input name="nome" type="text" id="nome" value="lucas"></td>
					</tr><tr>
						<td>Sobrenome</td>
						<td><input name="sobrenome" type="text" id="sobrenome" value="Gabriel"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input name="email" type="text" id="email" value="email"></td>
					</tr>
					<tr>
						<td>Sexo</td>
						<td><input name="sexo" type="radio" value="M" checked="checked">
							Masculino
							<input name="sexo" type="radio" value="F">
							Feminino </td>
						</tr>
						<tr>
							<td>Telefone</td>
							<td><input name="telefone" type="text" id="telefone" value="22222222"></td>
						</tr>
						<tr>
							<td>Data de Nascimento</td>
							<td><input name="nasc" type="text" id="nasc" value="2001-07-21"></td>
						</tr>
						<td><input type="submit" class="acoescarrinho" name="Submit" value="Gravar" style="margin: 20px auto;display: block;"></td>
					</tbody></table>
				</form>
			</div>
		</div>
		<?php include("php/Footer.php"); ?>
	</body>
	</html>
