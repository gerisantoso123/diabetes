<?php
$id = $_GET['id_user'];

include '../koneksi.php';

$hapus = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id' ");
if($hapus){
    echo"<script>alert('Berhasil Hapus Data');document.location.href='../user.php';</script>";

}else{
    echo"<script>alert('Gagal Hapus Data');document.location.href='../user.php';</script>";
}
?>