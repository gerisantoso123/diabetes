<?php
session_start();
if(!isset($_SESSION['nama'])){
  header("location:../login.php");
}
$nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SISTEM PAKAR</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/stylesss.css">
</head>

<body style="Background:url(assets/img/bg.jpg);">
  <!-- navbar -->
  <nav class="navbar navbar-static-top">
    <div class="container" id="navbar">
      <div class="navbar-header">
   
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1" style="margin-right: -93px;">
        <ul class="nav navbar-nav navbar-right">
          <li role="presentation"><a href="index.php">HOME</a></li>
          <li role="presentation"><a href="diagnosa.php">DIAGNOSA</a></li>
          <?php if(!isset($_SESSION['status'])){ ?>
                        <li class="nav-item">
                            <a href="login.php" class="btn btn-primary">Daftar / Login</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="logout.php"style="color: white !important;
                            background-color: #7ec6c2;
                            font-size: 16px;
                            border-radius: 21px;
                            padding: 11px 32px;
                            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">Logout</a>
                        </li>
                    <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar -->

  <!-- jumbotron -->
  <div id="background">
    <div class="jumbotron">
    <html>
<body>
    <p style="color : #000">Menampilkan hasil prediksi penyakit diabetes metode Naive Bayes</p><br>
    <p style="color : #000">Data Ujicoba Naive Bayes</p><br>

<?php
include 'koneksi.php';

$no=0;
$qu=mysqli_query($koneksi, "SELECT * FROM data");
while($dat=mysqli_fetch_array($qu)){
    $no++;
}
$normal=0;
$sakit=1;
$x1=$_POST['x1'];
$x2=$_POST['x2'];
$x3=$_POST['x3'];
$x4=$_POST['x4'];
$norm=mysqli_query($koneksi,"SELECT * FROM data WHERE y=0");
$normal=mysqli_num_rows($norm);
$sakt=mysqli_query($koneksi,"SELECT * FROM data WHERE y=1");
$sakit=mysqli_num_rows($sakt);

$v1c1=mysqli_query($koneksi, "SELECT * FROM data WHERE y=0 AND x1=$x1");
$vr1c1=mysqli_num_rows($v1c1);
$v1c2=mysqli_query($koneksi, "SELECT * FROM data WHERE y=1 AND x1=$x1");
$vr1c2=mysqli_num_rows($v1c2);

$v2c1=mysqli_query($koneksi, "SELECT * FROM data WHERE y=0 AND x2=$x2");
$vr2c1=mysqli_num_rows($v2c1);
$v2c2=mysqli_query($koneksi, "SELECT * FROM data WHERE y=1 AND x2=$x2");
$vr2c2=mysqli_num_rows($v2c2);

$v3c1=mysqli_query($koneksi, "SELECT * FROM data WHERE y=0 AND x6=$x3");
$vr3c1=mysqli_num_rows($v3c1);
$v3c2=mysqli_query($koneksi, "SELECT * FROM data WHERE y=1 AND x6=$x3");
$vr3c2=mysqli_num_rows($v3c2);

$v4c1=mysqli_query($koneksi, "SELECT * FROM data WHERE y=0 AND x8=$x4");
$vr4c1=mysqli_num_rows($v4c1);
$v4c2=mysqli_query($koneksi, "SELECT * FROM data WHERE y=1 AND x8=$x4");
$vr4c2=mysqli_num_rows($v4c2);

$has1=($normal/$no)*($vr1c1+1)/($normal+4)*($vr2c1+1)/($normal+4)*($vr3c1+1)/($normal+4)*($vr4c1+1)/($normal+4);
$has2=($sakit/$no)*($vr1c2+1)/($sakit+4)*($vr2c2+1)/($sakit+4)*($vr3c2+1)/($sakit+4)*($vr4c2+1)/($sakit+4);

if($has1>$has2){
    $out="Normal";
}else{
    $out="Sakit";
}

?>

<br>
<label> Jumlah Hamil: </label> <?php echo $x1; ?> <br>
<label> Glukosa: </label> <?php echo $x2; ?> <br>
<label> BMI: </label> <?php echo $x3; ?> <br>
<label> Usia: </label> <?php echo $x4; ?> <br>

<div class="container" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);width: 704px;margin-left: 0; background-color:white;">
    <div>
        <p>Perhitungan</p><br>
        <div class="row" style="display: flex;margin-left: 0;">
          <div class="col">
          <label>probabilitas 0</label><br>
            
              <u><?php echo number_format($has1=($normal/$no)*($vr1c1+1)/($normal+4)*($vr2c1+1)/($normal+4)*($vr3c1+1)/($normal+4)*($vr4c1+1)/($normal+4), 10, '.', ''); ?></u>
              
          </div>
          <div class="col" style="margin-left: 16mm;">
          <label>probabilitas 1</label><br>
            
              <u><?php echo number_format($has2=($sakit/$no)*($vr1c2+1)/($sakit+4)*($vr2c2+1)/($sakit+4)*($vr3c2+1)/($sakit+4)*($vr4c2+1)/($sakit+4), 10, '.', ''); ?></u>
              
          </div>
        </div>

        <div class="row" style="display: flex;margin-left: 0;">
          <div class="col">
            <?php echo number_format($had=($vr1c1+$vr1c2+2)/($normal+$sakit+8)*($vr2c1+$vr2c2+2)/($normal+$sakit+8)*($vr3c1+$vr3c2+2)/($normal+$sakit+8)*($vr4c1+$vr4c2+2)/($normal+$sakit+8), 10, '.', ''); ?>
          </div>
          <div class="col"  style="margin-left: 19mm;">
            <?php echo number_format($had=($vr1c1+$vr1c2+2)/($normal+$sakit+8)*($vr2c1+$vr2c2+2)/($normal+$sakit+8)*($vr3c1+$vr3c2+2)/($normal+$sakit+8)*($vr4c1+$vr4c2+2)/($normal+$sakit+8), 10, '.', ''); ?>
          </div>
        </div>

        <p>Hasil dari perhitungan :</p><br>

        <div class="row" style="display: flex;margin-left: 0;">
          <div class="col">
            <label>probabilitas 0</label><br>
          <?php echo number_format($perhitungan=($has1/$had), 10, '.', ''); ?>
          </div>
          <div class="col"  style="margin-left: 16mm;">
          <label>probabilitas 1</label><br>
          <?php echo number_format($perhitungan=($has2/$had), 10, '.', ''); ?>
          </div>
        </div>
        </div>

        <p>Hasil Klasifikasi Naive Bayes adalah: <?php echo $out; ?></p>
        <p>Note:</p><br>
        <label>Jika probabilitas 0 lebih kecil dari probabilitas 1 maka hasilnya SAKIT</label><br>
        <label>Jika probabilitas 1 lebih kecil dari probabilitas 0 maka hasilnya SEHAT</label>
    </div>

<?php

include 'admin/koneksi.php';
$pasien = "SELECT * FROM user WHERE nama = '$nama'";
    $resultpasien = mysqli_query($koneksi, $pasien);

    if (mysqli_num_rows($resultpasien) > 0) {
        $pas = mysqli_fetch_array($resultpasien);
        $nama = $pas['nama'];
    } else {
        // Handle the case when there are no results
    }
if(isset($_POST['simpan'])){
  $simpan = mysqli_query($koneksi, "INSERT into hasil_diagnosa value('','$nama ','$x1','$x2', '$x3','$x4','$out')");
}?>
</body>
</html>
  <!-- jumbotron -->

  <!-- container atas -->
 
  <!-- container atas -->

  <!-- container bawah -->
  
  </div>
  <!-- about -->

  <!-- kaki -->
  <div id="kaki" style="
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: right;
  font-size: 15px;">
    <div class="container">
      <h5 class="text-center">NAIVE BAYES. © 2023</h5>
    </div>
  </div>
  <!-- kaki -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
