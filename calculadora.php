<?php
  $bruto = $_GET['bruto'];
  $outros = $_GET['outros'];
//Caucula INSS
if($bruto <=1399.12){
  $inss = $bruto * 0.08;
}else if($bruto<=2331.88){
  $inss = $bruto * 0.09;
}else if($bruto<=4663.75){
  $inss = $bruto * 0.11;
}else if($bruto>=4663.76){
  $inss = 4663.76 * 0.11;
}else{
  echo "INSS não calculado. Valor do Salario bruto Invalido!";
}

$sbruto = $bruto - $inss;

//Caucula imposto de renda
if($sbruto <= 1903.98){
  $irenda = 0;
}else if($sbruto<=2826.65){
  $irenda = $sbruto * 0.075;
  $irenda = $irenda - 142.80;
}else if($sbruto<=3751.05){
  $irenda = $sbruto * 0.15;
  $irenda = $irenda - 354.80;
}else if($sbruto<=4664.68){
  $irenda = $sbruto * 0.225;
  $irenda = $irenda - 636.13;
}else if($sbruto>=4664.69){
  $irenda = $sbruto * 0.275;
  $irenda = $irenda - 869.36;
}else{
  echo "Imposto de renda não calculado. Valor do Salario bruto Invalido!";
}

$liquido = $sbruto - $irenda;


if($outros != 0)
  $liquido = $liquido - $outros;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calculadora de Salario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <div class="container text-center">
      <h1>Calculadora de Salário</h1>
    </div>
  </div>
  <div class="col-sm-10">        
  <table class="table table-bordered text-center">
    <thead class="text-center">
      <tr class="info">
        <th>Salário</th>
        <th>Outros Descontos</th>
        <th>INSS</th>
        <th>Imposto de Renda</th>
        <th>Liquido</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo "R$ ".round($bruto,2);?></td>
        <td><?php echo "R$ ".round($outros,2);?></td>
        <td><?php echo "R$ ".round($inss,2);?></td>
        <td><?php echo "R$ ".round($irenda,2);?></td>
        <td><?php echo "R$ ".round($liquido,2);?></td>
      </tr>
    </tbody>
      <tr class="active">
        <td><strong>Liquido</strong></td>
        <td><?php echo "R$ ".round($liquido,2);?></td>
      </tr>
  </table>
  <a href="index.html">
        <button type="submit" class="btn btn-default">Novo Calculo</button></a>
</div>
</div>
</body>
</html>