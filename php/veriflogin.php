<html>
<script type="text/javascript">
function logerrado(){
  alert ("Login Incorreto");
  setTimeout("window.location='../loginuser.php'");
}
</script>
</html>
<?php
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
  header("Location: ../loginuser.php"); exit;
}
include("conexao.php");

$email = mysql_real_escape_string($_POST['email']);
$senha = mysql_real_escape_string($_POST['senha']);

// Validação do usuário/senha digitados
$sql = "SELECT * FROM `usuarios` WHERE (`email` = '". $email ."')
AND (`senha` = '". ($senha) ."') AND (`ativo` = 1) LIMIT 1";
$query = $mysqli->query($sql);
if (mysqli_num_rows($query) != 1) {
  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
  echo "<script>logerrado()</script>"; exit;
} else {
  // Salva os dados encontados na variável $resultado
  $resultado = mysqli_fetch_assoc($query);
}
// Se a sessão não existir, inicia uma
if (!isset($_SESSION)) session_start();{

  // Salva os dados encontrados na sessão
  $_SESSION['UsuarioID']    = $resultado['iduser'];
  $_SESSION['UsuarioNome']  = $resultado['nome'];
  $_SESSION['UsuarioNivel'] = $resultado['nivel'];
  $_SESSION['Usuarioemail'] = $resultado['email'];
  $_SESSION['Usuariosenha'] = $resultado['senha'];
}
if ($_SESSION['UsuarioNivel'] == 1)  {

  // Redireciona o visitante
  header("Location: ../home.php"); exit;
}
if ($_SESSION['UsuarioNivel']  == 2) {
  // Redireciona o visitante
  header("Location: ../painel.php"); exit;

}
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['email']) OR ($_SESSION['nivel'] < $nivel_necessario))
// Destrói a sessão por segurança
session_destroy();
// Redireciona o visitante de volta pro login
header("Location: index.php"); exit;


//$mysqli->close();
?>
