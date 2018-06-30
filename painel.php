<html>
<head>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/painel.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta charset="utf-8">
	<title>Painel Rock For You</title>
	<?php
	include("php/conexao.php");
	session_start();
	if(!isset($_SESSION["Usuarioemail"]) ||!isset($_SESSION["Usuariosenha"])|| $_SESSION["UsuarioNivel"]== 1 ) {
		header("Location:home.php");
		exit;
	}
	?>
</head>
<body>
	<div id="interface">
		<?php
		include("php/conexao_menu.php");
		?>
		<div class="Fundo_painel">
			<ul>
				<li><a href="produtos.php"><img src="img/produtos.png" width="250" height="250"/><p>Produtos<p></a></li>
				<li><a href="estoque.php"><img src="img/estoque.png" width="250" height="250"/><p>Estoque<p></a></li>
				<li><a href="usuarios.php"><img src="img/usuario.png" width="250" height="250"/><p>Usuários<p></a></li>
				<li><a href="banner.php"><img src="img/tabela.png" width="250" height="250"/><p>Banners<p></a></li>
				<li><a href="pedidos.php"><img src="img/pedidos.png" width="250" height="250"/><p>Pedidos<p></a></li>
				<li><a href="cadingresso.php"><img src="img/estoque.png" width="250" height="250"/><p>Ingressos<p></a></li>
			</ul>
		</div>
	</div>
	<?php include("php/Footer.php"); ?>
</body>
</htmL>
