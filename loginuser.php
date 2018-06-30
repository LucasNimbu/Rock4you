<!DOCTYPE html>
<html>
<head>
	<title>Rock For You</title>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<?php
	session_start();
	include("php/conexao.php") ;
	?>
</head>
<body>
	<div id="interface">
		<?php
		include("php/conexao_menu.php") ;
		?>
		<div class="Fundo_Cadastro_login_menu">
			<div class="Cadastro_login_menu">
				<div class="form_login">
					<form id="form1" name="form1" method="post" action="php/veriflogin.php" border="0">
						<Legend><h2>Login</h2></Legend>
					</br>
					<table width="390" border="0" align="center">
						<tr>
							<td width="1">Email:</td>
							<td width="209"><input name="email" type="text" id="email" /></td>
						</tr>
						<tr>
							<td width="1">Senha:</td>
							<td width="209"><input name="senha" type="password" id="senha" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Entrar" style="cursor:pointer"/></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="form_cadastro">
				<form id="form1" name="form1" method="post" action="php/salvar.php">
					<legend><h2>Cadastrar</h2></legend>
				</br>
				<table width="390" border="0" align="center">
					<tr>
						<td width="165">Nome</td>
						<td width="209"><input name="nome" type="text" id="nome" /></td>
					</tr>
					<tr>
						<td width="165">Sobrenome</td>
						<td width="209"><input name="sobrenome" type="text" id="sobrenome" /></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input name="email" type="text" id="email" /></td>
					</tr>
					<tr>
						<td width="165">CPF</td>
						<td width="209"><input name="cpf" type="text" id="cpf" /></td>
					</tr>
					<tr>
						<td>Data de Nascimento</td>
						<td><input name="nasc" type="date" id="nasc" /></td>
					</tr>
					<tr>
						<td>Telefone</td>
						<td><input name="telefone" type="text" id="telefone" /></td>
					</tr>
					<tr>
						<td>Sexo</td>
						<td>
							<input name="sexo" type="radio" value="M" checked="checked" />
							Masculino
							<input name="sexo" type="radio" value="F" />
							Feminino
						</td>
					</tr>
					<tr>
						<td>Senha</td>
						<td><input name="senha" type="password" id="senha" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="Submit" value="Cadastrar" style="cursor:pointer"/></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
</div>
</div>
<?php include("php/Footer.php"); ?>
</body>
</html>
