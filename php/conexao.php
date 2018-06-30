<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'rock';
// Conecta-se ao banco de dados MySQL
$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
$db = mysqli_connect("localhost","root","","rock");
// Caso algo tenha dado errado, exibe uma mensagem de erro
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
?>
