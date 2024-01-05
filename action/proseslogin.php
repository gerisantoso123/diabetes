<html>
    <script src="../assets/js/sweetalert2.all.min.js"></script>
</html>
<?php
session_start();
include '../admin/koneksi.php';

//login
if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];

$cekuser = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' ");
$hitung = mysqli_num_rows($cekuser);
$user = mysqli_fetch_array($cekuser);

if($hitung>0){
    //kalau data ditemukan
    $ambildatarole = mysqli_fetch_array($cekuser);
    $role = $ambildatarole['role'];

    if($user['role']== 1){
        //kalau dia admin
        $_SESSION['log'] = 'logged';
        $_SESSION['role'] = '1';
        header('location:../admin/index.php');
    }else{
         //kalau dia bukan admin
         $_SESSION['log'] = 'logged';
         $_SESSION['role'] = '2';
         $_SESSION['status'] = "login";
         $_SESSION['nama']  = $user['nama'];
         header('location:../index.php');
    }
} else{
    //kalau tidak ditemukan
    echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Email atau Password salah',
      showConfirmButton: false,
      timer: 1500
    }).then(function() {
      window.location.href = '../login.php';
    });
  </script>";
}
};
?>