<?php
include("php/conexao.php");
session_start();
$id = $_GET["id"];
settype($id, "integer");
$sql = "select * from produto where idprod = $id";
$query = $mysqli->query($sql);
$dados  = mysqli_fetch_array($query);
$mysqli->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Cadastro</title>
</head>
<body>
  <div id="interface">
    <?php
    include("php/conexao_menu.php");
    ?>
    <div class="Fundo_cadprod">
      <form id="form1" name="form1"  enctype="multipart/form-data" method="post" action="php/salvareditprod.php">
        <input type="hidden" name="id" id="id" value="<?php echo $dados["idprod"];?>" />
        <h2 align="center"><strong>Edicao de Produtos </strong></h2>
        <table width="390" border="1" align="center">
          <td width="165">Nome</td>
          <td width="209"><input name="nomeprod" type="text" id="nomeprod" value="<?php echo $dados["nomeprod"];?>" /></td>
        </tr>
        <tr>
          <td>Preço</td>
          <td><input name="preco" type="text" id="preco" value="<?php echo $dados["preco"];?>" /></td>
        </tr>
        <tr>
          <td>Desconto porcentagem</td>
          <td><input name="descontopor" type="text" id="preco" value="<?php echo $dados["descontopor"];?>" /></td>
        </tr>
        <tr>
          <td>Desconto R$</td>
          <td><input name="descontosub" type="text" id="preco" value="<?php echo $dados["descontosub"];?>" /></td>
        </tr>
        <tr>
          <td>Imagem</td>
          <td><input name='imgprod' type='file' required id='imgprod'></td>
        </tr>
        <tr>
          <td>Imagem 2</td>
          <td><input name='imgprod2' type='file' id='imgprod2'></td>
        </tr>
        <tr>
          <td>Imagem 3</td>
          <td><input name='imgprod3' type='file' id='imgprod3'></td>
        </tr>
        <tr>
          <td>Imagem 4</td>
          <td><input name='imgprod4' type='file' id='imgprod4'></td>
        </tr>
        <tr>
          <td>Imagem 5</td>
          <td><input name='imgprod5' type='file' id='imgprod5'></td>
        </tr>
        <tr>
          <td>Categoria</td>
          <td>
            <select name="categoria">
              <option value="<?php echo $dados["categoria"];?>">Selecione a Categoria</option>
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
            <td><input name="banda" value="<?php echo $dados["banda"];?>" type="text"></td>
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
