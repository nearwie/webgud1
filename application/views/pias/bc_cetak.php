<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Barcode <?= $btr['kode_brg'] . ' - ' . $btr['nama_brg']?></title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head>
<body>

  <?php

    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($btr['kode_brg'], $generator::TYPE_CODE_128)) . '">';
?>
 <div >
<label>
<?= $btr['kode_brg'];?></label></div>
 
  
   
<!--<div class="container-fluid"> -->
   
</body>
</html>