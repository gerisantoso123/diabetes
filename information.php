<?php
session_start();
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
          <li role="presentation"><a href="index.php" style="color : #000">HOME</a></li>
          <li role="presentation"><a href="information.php" style="color : #000">INFORMATION</a></li>
          <?php if(!isset($_SESSION['status'])){ ?>
                        <li class="nav-item">
                            <a href="" class=""></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="diagnosa.php" style="color : #000">DIAGNOSA</a>
                        </li>
                    <?php } ?>
          <?php if(!isset($_SESSION['status'])){ ?>
                        <li class="nav-item">
                            <a href="login.php" style="color: white !important;
                            background-color: #7ec6c2;
                            font-size: 16px;
                            border-radius: 21px;
                            padding: 11px 32px;
                            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">Daftar / Login</a>
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
  
    <div class="container" style="
    padding-right: 660px;
    text-align: justify;
    background: honeydew;
    box-shadow: 0.3em 0.3em 1em rgb(165 165 165 / 60%);
    border-radius: 14px;
    ">
      <h1 style="color : #000">SISTEM PAKAR</h1>
      <p style="color : #000">DIAGNOSA PENYAKIT DIABETES</p>
      <p><h5>Diabetes adalah penyakit metabolik yang di tandai dengan tingginya kadar glukosa darah (hyperglikemia) sebagai akibat dari kekurangan sekresi insulin, gangguan aktifitas insulina atau keduanya.</h5></p>
      <p><h5>1.	Pregnancies: Untuk menyatakan Jumlah kehamilan</h5></p>
      <p><h5>2.	Glucose: Untuk menyatakan kadar Glukosa dalam darah</h5></p>
      <p><h5>3.	BloodPressure: Untuk menyatakan pengukuran tekanan darah</h5></p>
      <p><h5>4.	SkinThickness: Untuk menyatakan ketebalan kulit</h5></p>
      <p><h5>5.	Insulin: Untuk menyatakan kadar Insulin dalam darah</h5></p>
      <p><h5>6.	BMI: Untuk menyatakan indeks massa tubuh</h5></p>
      <p><h5>7.	DiabetesPedigreeFunction: Untuk menyatakan persentase Diabetes</h5></p>
      <p><h5>8.	Age: Untuk menyatakan usia</h5></p>
    </div>
  <!-- jumbotron -->

  <!-- container atas -->
 
  <!-- container atas -->

  <!-- container bawah -->
 
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