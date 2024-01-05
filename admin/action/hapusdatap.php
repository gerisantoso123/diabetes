<?php
$id = $_GET['no'];

include '../koneksi.php';

$hapus = mysqli_query($koneksi, "DELETE FROM data WHERE no = '$id' ");
if($hapus){
    echo"<script>alert('Berhasil Hapus Data');document.location.href='../dataperhitungan.php';</script>";

}else{
    echo"<script>alert('Gagal Hapus Data');document.location.href='../dataperhitungan.php';</script>";
}
?>