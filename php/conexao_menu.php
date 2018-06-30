<?php
include('conexao.php');
?>
<section>
  <div id="container-menu">
    <a href="home.php" id="logo-menu">
      <img src="img/logo.jpg"/>
    </a>
    <div id="menu-busca">
      <form name="buscaprod" method="get" action="busca.php">
        <fieldset id="busca">
          <input type="text" id="texto-busca" name="buscaprod" autocomplete="off">
          <input type="image" src="img/Botao-pesquisar.png" value="submit" id="botao-busca">
        </fieldset>
      </form>
    </div>
    <?php
    if(!isset($_SESSION["Usuarioemail"]) ||!isset($_SESSION["Usuariosenha"])) {
      echo "<div id='menu_cliente'>";
      echo "<a href='loginuser.php'>";
      echo "<p>Entrar<p>";
      echo "<div id='img_menu_cliente'></div>";
      echo "</a>";
      echo "</div>";
    }
    else{
      echo "<div id='userlog'>";
      echo "<p>";
      echo $_SESSION["UsuarioNome"];
      echo "</p>";
      echo "<div id='img_userlog'></div>";
      echo "<br/>";
      echo "<div id='img_menuclientedrop'></div>";
      echo "<ul>";
      if (($_SESSION["UsuarioNivel"]== 2)){
        echo "<li><a href='painel.php'>Painel</a></li>";
      }
      echo "<li><a href='carrinho.php'>Carrinho</a></li>";
      echo "<li><a href='meuspedidos.php'>Meus Pedidos</a></li>";
      echo "<li><a href='editarconta.php'>Editar conta</a></li>";
      echo "<li><a href='php/sair.php'>Deslogar</a></li>";
      echo "</ul>";
      echo "</div>";
    }
    ?>
  </div>
</section>
<section id="container_menu_loja">
  <nav id="menu-loja">
    <ul>
      <li><p style="border-left:none" > Roupas </p><div id="menulojadrop"></div>
        <ul>
          <?php
          $sql = "SELECT * FROM categoria";
          $result = mysqli_query($db,$sql);
          while($row = mysqli_fetch_array($result)) {
            $idc = $row["nomecat"];
            if($row["tipocat"] == "roupas"){
              echo "<a href='pagcat.php?cat=$idc'>";
              echo "<span class='nomecat'>" .$row['nomecat']."</span>";
              echo "</a>";
            }
          }
          ?>
        </ul>
      </li>
      <li><p> Acessorios </p><div id='menulojadrop'></div>
        <ul>
          <?php
          $sql = "SELECT * FROM categoria";
          $result = mysqli_query($db,$sql);
          while($row = mysqli_fetch_array($result)) {
            $idc = $row["nomecat"];
            if($row["tipocat"] == "acessorios"){
              echo "<a href='pagcat.php?cat=$idc'>";
              echo "<span class='nomecat'>" .$row['nomecat']."</span>";
              echo "</a>";
            }
          }
          ?>
        </ul>
      </li>
      <li><p> Produtos </p><div id='menulojadrop'></div>
        <ul>
          <?php
          $sql = "SELECT * FROM categoria";
          $result = mysqli_query($db,$sql);
          while($row = mysqli_fetch_array($result)) {
            $idc = $row["nomecat"];
            if($row["tipocat"] == "produtos"){
              echo "<a href='pagcat.php?cat=$idc'>";
              echo "<span class='nomecat'>" .$row['nomecat']."</span>";
              echo "</a>";
            }
          }
          ?>
        </ul>
      </li>
      <li><a href="ingressos.php"><p> Ingressos </p></a></li>
    </ul>
  </nav>
</section>
