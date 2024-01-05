<?php

include '../koneksi.php';

if(isset($_POST['ubah'])){
    $id = $_POST['no'];
    $x1 = $_POST['x1'];
    $x2 = $_POST['x2'];
    $x6 = $_POST['x6'];
    $x8 = $_POST['x8'];
    $y = $_POST['y'];

$rubah = mysqli_query($koneksi, "UPDATE data SET 
                                                        x1 = '$x1',
                                                        x2 = '$x2',
                                                        x6 = '$x6',
                                                        x8 = '$x8',
                                                        y = '$y'
                                                        WHERE no ='$id'");
if($rubah){
    echo"<script>alert('Berhasil Edit Data');document.location.href='../dataperhitungan.php';</script>";

}else {
    echo"<script>alert('Gagal Edit Data');document.location.href='../dataperhitungan.php';</script>";
}
}
?>