<?php
session_start();
include("conexao.php");

$nomeprod  = $_POST["nomeprod"];
$preco     = $_POST["preco"];
$descontosub     = $_POST["descontosub"];
$descontopor     = $_POST["descontopor"];
$categoria     = $_POST["categoria"];
$banda    = $_POST["banda"];

if(isset($_FILES['imgprod'])){

  $altura = "500";
  $largura = "500";

  switch($_FILES['imgprod']['type']):
    case 'image/jpeg';
    case 'image/pjpeg';
    $imagem_temporaria = imagecreatefromjpeg($_FILES['imgprod']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);

    $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);

    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    imagejpeg($imagem_redimensionada, '../upload/' . $_FILES['imgprod']['name']);



    break;

    //Caso a imagem seja extensão PNG cai nesse CASE
    case 'image/png':
    case 'image/x-png';
    $imagem_temporaria = imagecreatefrompng($_FILES['imgprod']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    /* Configura a nova largura */
    $nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);

    /* Configura a nova altura */
    $nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);

    /* Retorna a nova imagem criada */
    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);

    /* Copia a nova imagem da imagem antiga com o tamanho correto */
    //imagealphablending($imagem_redimensionada, false);
    //imagesavealpha($imagem_redimensionada, true);

    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
    imagepng($imagem_redimensionada, '../upload/' . $_FILES['imgprod']['name']);
    break;
  endswitch;

  $nomeimg = strtolower($_FILES['imgprod']['name']);
  $diretorio = "../upload/large/";
  $imgprod = $nomeimg;

  move_uploaded_file ($_FILES['imgprod']['tmp_name'], $diretorio.$imgprod);
}else{
  $imgprod = NULL;
};

if(isset($_FILES['imgprod2'])){

  $altura = "500";
  $largura = "500";

  switch($_FILES['imgprod2']['type']):
    case 'image/jpeg';
    case 'image/pjpeg';
    $imagem_temporaria = imagecreatefromjpeg($_FILES['imgprod2']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);

    $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);

    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    imagejpeg($imagem_redimensionada, '../upload/' . $_FILES['imgprod2']['name']);



    break;

    //Caso a imagem seja extensão PNG cai nesse CASE
    case 'image/png':
    case 'image/x-png';
    $imagem_temporaria = imagecreatefrompng($_FILES['imgprod2']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    /* Configura a nova largura */
    $nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);

    /* Configura a nova altura */
    $nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);

    /* Retorna a nova imagem criada */
    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);

    /* Copia a nova imagem da imagem antiga com o tamanho correto */
    //imagealphablending($imagem_redimensionada, false);
    //imagesavealpha($imagem_redimensionada, true);

    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
    imagepng($imagem_redimensionada, '../upload/' . $_FILES['imgprod2']['name']);
    break;
  endswitch;

  $nomeimg2 = strtolower($_FILES['imgprod2']['name']);
  $diretorio = "../upload/large/";
  $imgprod2 = $nomeimg2;

  move_uploaded_file ($_FILES['imgprod2']['tmp_name'], $diretorio.$imgprod2);
}else{
  $imgprod2 = NULL;
};
if(isset($_FILES['imgprod3'])){

  $altura = "500";
  $largura = "500";

  switch($_FILES['imgprod3']['type']):
    case 'image/jpeg';
    case 'image/pjpeg';
    $imagem_temporaria = imagecreatefromjpeg($_FILES['imgprod3']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);

    $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);

    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    imagejpeg($imagem_redimensionada, '../upload/' . $_FILES['imgprod3']['name']);



    break;

    //Caso a imagem seja extensão PNG cai nesse CASE
    case 'image/png':
    case 'image/x-png';
    $imagem_temporaria = imagecreatefrompng($_FILES['imgprod3']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    /* Configura a nova largura */
    $nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);

    /* Configura a nova altura */
    $nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);

    /* Retorna a nova imagem criada */
    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);

    /* Copia a nova imagem da imagem antiga com o tamanho correto */
    //imagealphablending($imagem_redimensionada, false);
    //imagesavealpha($imagem_redimensionada, true);

    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
    imagepng($imagem_redimensionada, '../upload/' . $_FILES['imgprod3']['name']);
    break;
  endswitch;

  $nomeimg3 = strtolower($_FILES['imgprod3']['name']);
  $diretorio = "../upload/large/";
  $imgprod3 = $nomeimg3;

  move_uploaded_file ($_FILES['imgprod3']['tmp_name'], $diretorio.$imgprod3);
}else{
  $imgprod3 = NULL;
};


if(isset($_FILES['imgprod4'])){

  $altura = "500";
  $largura = "500";

  switch($_FILES['imgprod4']['type']):
    case 'image/jpeg';
    case 'image/pjpeg';
    $imagem_temporaria = imagecreatefromjpeg($_FILES['imgprod4']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);

    $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);

    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    imagejpeg($imagem_redimensionada, '../upload/' . $_FILES['imgprod4']['name']);



    break;

    //Caso a imagem seja extensão PNG cai nesse CASE
    case 'image/png':
    case 'image/x-png';
    $imagem_temporaria = imagecreatefrompng($_FILES['imgprod4']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    /* Configura a nova largura */
    $nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);

    /* Configura a nova altura */
    $nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);

    /* Retorna a nova imagem criada */
    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);

    /* Copia a nova imagem da imagem antiga com o tamanho correto */
    //imagealphablending($imagem_redimensionada, false);
    //imagesavealpha($imagem_redimensionada, true);

    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
    imagepng($imagem_redimensionada, '../upload/' . $_FILES['imgprod4']['name']);
    break;
  endswitch;

  $nomeimg4 = strtolower($_FILES['imgprod4']['name']);
  $diretorio = "../upload/large/";
  $imgprod4 = $nomeimg4;

  move_uploaded_file ($_FILES['imgprod4']['tmp_name'], $diretorio.$imgprod4);
}else{
  $imgprod4 = NULL;
};

if(isset($_FILES['imgprod5'])){

  $altura = "500";
  $largura = "500";

  switch($_FILES['imgprod5']['type']):
    case 'image/jpeg';
    case 'image/pjpeg';
    $imagem_temporaria = imagecreatefromjpeg($_FILES['imgprod5']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    $nova_largura = $largura ? $largura : floor (($largura_original / $altura_original) * $altura);

    $nova_altura = $altura ? $altura : floor (($altura_original / $largura_original) * $largura);

    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    imagejpeg($imagem_redimensionada, '../upload/' . $_FILES['imgprod5']['name']);



    break;

    //Caso a imagem seja extensão PNG cai nesse CASE
    case 'image/png':
    case 'image/x-png';
    $imagem_temporaria = imagecreatefrompng($_FILES['imgprod5']['tmp_name']);

    $largura_original = imagesx($imagem_temporaria);
    $altura_original = imagesy($imagem_temporaria);

    /* Configura a nova largura */
    $nova_largura = $largura ? $largura : floor(( $largura_original / $altura_original ) * $altura);

    /* Configura a nova altura */
    $nova_altura = $altura ? $altura : floor(( $altura_original / $largura_original ) * $largura);

    /* Retorna a nova imagem criada */
    $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);

    /* Copia a nova imagem da imagem antiga com o tamanho correto */
    //imagealphablending($imagem_redimensionada, false);
    //imagesavealpha($imagem_redimensionada, true);

    imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0, 0, 0, 0, $nova_largura, $nova_altura, $largura_original, $altura_original);

    //função imagejpeg que envia para o browser a imagem armazenada no parâmetro passado
    imagepng($imagem_redimensionada, '../upload/' . $_FILES['imgprod5']['name']);
    break;
  endswitch;

  $nomeimg5 = strtolower($_FILES['imgprod5']['name']);
  $diretorio = "../upload/large/";
  $imgprod5 = $nomeimg5;

  move_uploaded_file ($_FILES['imgprod5']['tmp_name'], $diretorio.$imgprod5);
}else{
  $imgprod5 = NULL;
};

$sql = "INSERT INTO produto (categoria, nomeprod , preco, descontosub, descontopor, imgprod , imgprod2 , imgprod3 , imgprod4 , imgprod5 ,dataimg, banda)
VALUES ( '$categoria', '$nomeprod', '$preco', '$descontosub', '$descontopor', '$imgprod', '$imgprod2', '$imgprod3', '$imgprod4', '$imgprod5',NOW(), '$banda')";
$query = $mysqli->query($sql);

$mysqli->close();
header("Location:../produtos.php");
?>
