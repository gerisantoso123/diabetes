<?php

include '../admin/koneksi.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$nomorhp = $_POST['nomorhp'];
$role = 2;

$register = mysqli_query($koneksi, "INSERT into user value('$id_user','$nama', '$password','$alamat','$email', '$nomorhp','$role')");
if($register){
    echo"<script>alert('Berhasil Register');document.location.href='../login.php';</script>";

}else {
    echo"<script>alert('Gagal Register');document.location.href='../register.php';</script>";
}

?>