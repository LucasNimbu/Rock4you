<?php

function calcular_frete(){
  $cep_origem = "27410200";
  $cep_destino = $_GET['cepDestino'];
  $peso = $_GET['peso'];
  $valor = $_GET['valor'];
  $tipo_do_frete ="41106";
  $altura = "6";
  $largura = "20";
  $comprimento = "20";
  $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
  $url .= "nCdEmpresa=";
  $url .= "&sDsSenha=";
  $url .= "&sCepOrigem=" . $cep_origem;
  $url .= "&sCepDestino=" . $cep_destino;
  $url .= "&nVlPeso=" . $peso;
  $url .= "&nVlLargura=" . $largura;
  $url .= "&nVlAltura=" . $altura;
  $url .= "&nCdFormato=1";
  $url .= "&nVlComprimento=" . $comprimento;
  $url .= "&sCdMaoProria=n";
  $url .= "&nVlValorDeclarado=" . $valor;
  $url .= "&sCdAvisoRecebimento=n";
  $url .= "&nCdServico=" . $tipo_do_frete;
  $url .= "&nVlDiametro=0";
  $url .= "&StrRetorno=xml";
  //Sedex: 40010
  //Pac: 41106
  $xml = simplexml_load_file($url);
  return $xml->cServico;
}
$val = (calcular_frete());
echo $val->Valor;
?>
