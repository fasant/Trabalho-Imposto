<?php
  $bruto = $_GET['bruto'];
  $outros = $_GET['outros'];
//Caucula INSS
if($bruto <=1399.12){
  $inss = $bruto * 0.08;
  $cinss = 'A';
}else if($bruto<=2331.88){
  $inss = $bruto * 0.09;
  $cinss = 'B';
}else if($bruto<=4663.75){
  $inss = $bruto * 0.11;
  $cinss = 'C';
}else if($bruto>=4663.76){
  $inss = 4663.76 * 0.11;
  $cinss = 'D';
}else{
  echo "INSS não calculado. Valor do Salario bruto Invalido!";
}

$sbruto = $bruto - $inss;

//Caucula imposto de renda
if($sbruto <= 1903.98){
  $irenda = 0;
  $cirenda = 'A';
}else if($sbruto<=2826.65){
  $irenda = $sbruto * 0.075;
  $irenda = $irenda - 142.80;
  $cirenda = 'B';
}else if($sbruto<=3751.05){
  $irenda = $sbruto * 0.15;
  $irenda = $irenda - 354.80;
  $cirenda = 'C';
}else if($sbruto<=4664.68){
  $irenda = $sbruto * 0.225;
  $irenda = $irenda - 636.13;
  $cirenda = 'D';
}else if($sbruto>=4664.69){
  $irenda = $sbruto * 0.275;
  $irenda = $irenda - 869.36;
  $cirenda = 'E';
}else{
  echo "Imposto de renda não calculado. Valor do Salario bruto Invalido!";
}

$liquido = $sbruto - $irenda;


if($outros != null)
  $liquido = $liquido - $outros;
else
  $outros = 0;
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
    <thead>
      <tr>
        <th>Evento</th>
        <th>Classe</th>
        <th>Proventos</th>
        <th>Descontos</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong>Salário Bruto</strong></td>
        <td>--</td>
        <td><?php echo "R$ ".round($bruto,2);?></td>
        <td>--</td>
      </tr>
      <tr>
        <td><strong>INSS</strong></td>
        <td><?php echo $cinss;?></td>
        <td>--</td>
        <td><?php echo "R$ ".round($inss,2);?></td>
      </tr>
      <tr>
        <td><strong>Imposto de Renda</strong></td>
        <td><?php echo $cirenda;?></td>
        <td>--</td>
        <td><?php echo "R$ ".round($irenda,2);?></td>
      </tr>
      <tr>
        <td><strong>Outros Descontos</strong></td>
        <td>--</td>
        <td>--</td>
        <td><?php echo "R$ ".round($outros,2);?></td>
      </tr>
      <tr>
        <td colspan="2"><strong>Totais</strong></td>
        <td><?php echo "R$ ".round($bruto,2);?></td>
        <td><?php echo "R$ ".round($inss + $irenda + $outros,2);?></td>
      </tr>
      <tr class="active">
        <td colspan="2"><strong>Liquido</strong></td>
        <td colspan="2"><?php echo "R$ ".round($liquido,2);?></td>
      </tr>
    </tbody>
  </table>
  <a href="index.html">
        <button type="submit" class="btn btn-default">Novo Calculo</button></a>
</div>
</div>
</body>
</html>