<html>
<body>
    <p>Menampilkan hasil prediksi penyakit diabetes metode Naive Bayes</p><br>
    <p>Data Ujicoba Naive Bayes</p><br>

<?php
include '../admin/koneksi.php';

$no=0;
$qu=mysqli_query($koneksi, "SELECT * FROM data");
while($dat=mysqli_fetch_array($qu)){
    $no++;
}
$normal=0;
$sakit=0;
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

<p>Hasil Klasifikasi Naive Bayes adalah: <?php echo $out; ?> </p><br>
</body>
</html>