<?php
include '_koneksi.php';
include '_method.php';

cek_session();

$sql = "SELECT * FROM produk";
$result = $conn->query($sql);
$jumlah_produk = $result->num_rows ;


$sql = "SELECT * FROM kategori";
$result = $conn->query($sql);
$jumlah_kategori = $result->num_rows ;


$sql = "SELECT * FROM supplier";
$result = $conn->query($sql);
$jumlah_supplier = $result->num_rows ;

$sql = "SELECT SUM(qty) AS qty FROM produk_masuk";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$jumlah_produk_masuk = $row['qty'] ;

$sql = "SELECT SUM(qty_keluar) AS qty_keluar FROM produk_keluar";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$jumlah_produk_keluar = $row['qty_keluar'] ;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <title>My Inventori</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	<style>
	body{
    background:#FAFAFA;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
	</style>
	

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
		<?php include 'inc/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
				<?php include 'inc/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">				
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-xl-3">
								<div class="card bg-c-blue order-card" onclick="window.location.replace('produk.php');">
									<div class="card-block">
										<h4 class="m-b-20">Produk</h4>
										<p class="m-b-0">
											Jumlah Produk<span class="f-right"><?= $jumlah_produk ?></span><br/>
											Produk Masuk<span class="f-right"><?= $jumlah_produk_masuk ?></span><br/>
											Produk Keluar<span class="f-right"><?= $jumlah_produk_keluar ?></span><br/>
										</p>
									</div>
								</div>
							</div>
							
							<div class="col-md-4 col-xl-3">
								<div class="card bg-c-green order-card" onclick="window.location.replace('kategori.php');">
									<div class="card-block">
										<h4 class="m-b-20">Kategori</h4>
										<p class="m-b-0">Jumlah Kategori<span class="f-right"><?= $jumlah_kategori ?></span></p>
									</div>
								</div>
							</div>
							
							<div class="col-md-4 col-xl-3">
								<div class="card bg-c-yellow order-card" onclick="window.location.replace('supplier.php');">
									<div class="card-block">
										<h4 class="m-b-20">Supplier</h4>
										<p class="m-b-0">Jumlah Supplier<span class="f-right"><?= $jumlah_supplier ?></span></p>
									</div>
								</div>
							</div>								
						</div>
					</div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
			<?php include 'inc/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
	<?php include 'inc/modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>