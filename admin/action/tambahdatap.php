<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                           
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="../dataperhitungan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Data Perhitungan
                            </a>
                            <a class="nav-link" href="../user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                User
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Data</h1>

                        <div class="container-fluid">
                <br>

                <form method="POST" action="">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pregnancies (x1)</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" name="x1" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Glucose (x2)</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="x2">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">BMI (x6)</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="x6">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Age (x8)</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="x8">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Outcome (y)</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="y">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Tambah Data</button>
                    <a href="../dataperhitungan.php" class="btn btn-danger">Batal</a>
                </form>
                </div>
                <!-- /.container-fluid -->

            </div>
                       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>

<?php

include '../koneksi.php';
if(isset($_POST['simpan'])){
$no = $_POST['no'];
$x1 = $_POST['x1'];
$x2 = $_POST['x2'];
$x6 = $_POST['x6'];
$x8 = $_POST['x8'];
$y = $_POST['y'];

$simpan = mysqli_query($koneksi, "INSERT into data value('$no','$x1', '$x2','$x6','$x8', '$y')");
if($simpan){
    echo"<script>alert('Berhasil Tambah Data');document.location.href='../dataperhitungan.php';</script>";

}else {
    echo"<script>alert('GagalTambah Data');document.location.href='../dataperhitungan.php';</script>";
}
}
?>