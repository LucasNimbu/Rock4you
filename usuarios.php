<?php
include("php/conexao.php");
session_start()
?>
<?php
include("php/conexao_menu.php");
$sql = "select * from usuarios";
$query = $mysqli->query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta charset="utf-8">
  <title>Lista de Usuarios</title>
</head>
<body>
  <div id="interface">
    <?php
    if(mysqli_fetch_array($query) < 1) {
      $mysqli->close();
    }
    ?>
    <div class="Fundo_cadprod">
      <table width="500" border="1" align="center" style="padding:50px">
        <tr>
          <th>ID </th>
          <th>NOME</th>
          <th>SOBRENOME</th>
          <th>EMAIL</th>
          <th>SEXO</th>
          <th>TELEFONE</th>
          <th>DATA DE NASCIMENTO</th>
          <th>CPF</th>
          <th>NIVEL</th>
          <th>STATUS</th>
          <th>EDITAR/EXCLUIR</th>
        </tr>
        <?php
        $sql = "SELECT * FROM usuarios";
        while($L = mysqli_fetch_array($query)) {
          $id    = $L["iduser"] ;
          $nome      = $L["nome"];
          $sobrenome = $L["sobrenome"];
          $email     = $L["email"];
          $sexo      = $L["sexo"] == "M" ? "Masculino" : "Feminino";
          $telefone  = $L["telefone"];
          $nasc      = $L["nasc"];
          $cpf       = $L["cpf"];
          $nivel     = $L["nivel"] == "1" ? "Usuario" : "Administrador";
          $ativo    = $L["ativo"] == "1" ? "Ativo" :  "Banido";
          echo"
          <tr>
          <td>$id</td>
          <td>$nome</td>
          <td>$sobrenome</td>
          <td>$email</td>
          <td>$sexo</td>
          <td>$telefone</td>
          <td>$nasc</td>
          <td>$cpf</td>
          <td>$nivel</td>
          <td>$ativo</td>
          <td><a href=\"editar.php?id=$id\">[Editar]</a> |
          <a href=\"php/excluir.php?id=$id\">[Excluir]</a></td>
          </tr>\n";
        }
        ?>
      </table>
    </div>
  </div>
  <?php include("php/Footer.php"); ?>
</body>
</html>
