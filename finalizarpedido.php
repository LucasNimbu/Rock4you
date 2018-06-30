<?php

	  include("php/conexao.php");
      session_start();
 $idpedido = $_GET['idpedido'];
 $sql= "SELECT * FROM `pedido` WHERE id='".$idpedido."'";
 $query = $mysqli->query($sql);
 $pedido = mysqli_fetch_array($query);
 $valor = $pedido['valor'];
 if(isset($_GET['acao'])){
         if($_GET['acao'] == 'confirmar'){
				$sql = "UPDATE `pedido` SET `situacao` = 'Aguardando Pagamento'	WHERE `pedido`.`id`  = '$idpedido'";
				$query = $mysqli->query($sql);
				echo"<script>window.location='meuspedidos.php'</script>";
			}
			if($_GET['acao'] == 'cancelar'){
				$sql = "DELETE FROM `pedido` WHERE id='".$idpedido."'";
				$query = $mysqli->query($sql);
				$sql = "DELETE FROM `itens-pedido` WHERE idpedido='".$idpedido."'";
				$query = $mysqli->query($sql);
				echo"<script>window.location='home.php'</script>";
			}
		}
?>
<head>
<script language="javascript" src="Js/ajax.js"></script>
<script language="javascript" src="Js/calculoFrete.js"></script>
<script src='Js/jquery-3.2.1.min.js'/></script>
    <script src="Js/funcoes.js"></script>
    <title>Rock For You</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body onLoad="slide1()">
<div id="interface">
<?php
      include("php/conexao_menu_fixo.php");
      include("php/conexao_menu.php");
      ?>
	<section id="container-carrinho">
	 <span class="tituloprodutos">Confimar Pedido</span>
<?php
echo"
<div id='headerconfirmar'>
		<ul>
			<p>Código pedido:  ".$pedido['id']."</p>
			<p>Valor:  ".str_replace('.', ',',$valor)."</p>
			<p>ValorFrete:  ".str_replace('.', ',',$pedido['frete'])."</p>
			<p>Cep:  ".$pedido['cep']."</p>
		</ul>
</div>
<form method='post' id='confirmarpedidoform' action='php/finalizarpedido.php?idpedido=".$idpedido."'>
	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
          <tr style='line-height: 50px; background: #313131; border-bottom: 2px solid #000;'>
            <th class='thcolor' width='244'>Produto</th>
			<th class='thcolor' width='100'>Cor</th>
			<th class='thcolor' width='20'>Tamanho</th>
            <th class='thcolor' width='79'>Quantidade</th>
            <th class='thcolor' width='89'>Preço</th>
          </tr>";
	  $sql1= "select * from `itens-pedido` where `idpedido`='$idpedido'";
	  $query2 = $mysqli->query($sql1);
	  while($row = mysqli_fetch_array($query2)){
		 echo "	<tr class='linhatabela'>
                     <td>".$row['nome']."</td>
					 <td>".$row['cor']."</td>
					 <td>".$row['tamanho']."</td>
                     <td>".$row['quantidade']."</td>
                     <td>R$ ".$row['preco']."</td>
				</tr>";
				};
?>
<tfoot width="100%" height="50px">
  <tr style='line-height: 50px; background: #313131; border-bottom: 2px solid #000;'><td>&nbsp </td><td>&nbsp </td><td>&nbsp </td><td>&nbsp </td><td>&nbsp </td></tr>
</tfoot>
</table>
<div id='container_acoes'>
<div>
	<a class="continuar" href="finalizarpedido.php?idpedido=<?php echo "$idpedido"?>&acao=confirmar">Confirmar</a>
	</div>
	<div>
    <a class="continuar" href="finalizarpedido.php?idpedido=<?php echo "$idpedido"?>&acao=cancelar">Cancelar</a>
	</div>
</div>
</form>
	</section>
</div>
    <?php
    include("php/Footer.php");
    ?>
</body>
</html>
