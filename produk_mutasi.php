<?php
include '_koneksi.php';
include '_method.php';

cek_session();

$id_produk = $_GET['id_produk'];

$sql = "SELECT * FROM produk WHERE id_produk = $id_produk";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $produk = $row;
  }
} else {
  echo "0 results";
}


$sql = "SELECT sum(qty) AS qty FROM produk_masuk WHERE id_produk = $id_produk";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $produk_masuk = $row;
  }
} else {
  echo "0 results";
}

$sql = "SELECT sum(qty_keluar) AS qty_keluar FROM produk_keluar WHERE id_produk = $id_produk";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $produk_keluar = $row;
  }
} else {
  echo "0 results";
}

$stok_tersedia = $produk_masuk['qty'] - $produk_keluar['qty_keluar'];


$sql = "SELECT * 
FROM produk_masuk 
INNER JOIN produk
ON produk_masuk.id_produk = produk.id_produk
INNER JOIN supplier
ON produk_masuk.id_supplier = supplier.id_supplier
WHERE produk_masuk.id_produk = $id_produk
ORDER BY produk_masuk.kadaluarsa";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $produk_masuk_array[] = $row;
  }
} else {
  echo "0 results";
}

foreach($produk_masuk_array as $produk_masuk_array){
	$x = 1; 
	
	while($x <= $produk_masuk_array['qty']) {
	  $produk_masuk_array_tmp[] = $produk_masuk_array;
	  $x++;
	} 
	
	unset($x);
}

$produk_masuk_array_tmp = array_slice($produk_masuk_array_tmp,$produk_keluar['qty_keluar']);

$result = array();
foreach ($produk_masuk_array_tmp as $element) {
    $result[$element['kadaluarsa']][] = $element;
}

// var_dump($result);die();

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
					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Mutasi <?= $produk['nama_produk'] ?></h1>
					</div>
					
					<div class="container">
						<div class="row bg-white">
							<table class="table table-bordered" id="dataTable" cellspacing="0">
								<thead class="table-dark">
									<tr>
										<th>Nama Produk</th>
										<th>Stok Masuk</th>
										<th>Stok Keluar</th>
										<th>Stok Tersedia</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?= $produk['nama_produk'] ?></td>
										<td><?= $produk_masuk['qty'] ?></td>
										<td><?= $produk_keluar['qty_keluar'] ?></td>
										<td><?= $stok_tersedia ?></td>
									</tr>
								</tbody>
							</table>						
								
						</div>
					</div>
					
					
					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Produk Tersedia (Kadaluarsa)</h1>
					</div>
					
					<div class="container">
						<div class="row bg-white">
							<table class="table table-bordered" id="dataTable" cellspacing="0">
								<thead class="table-dark">
									<tr>
										<th>Nama Produk</th>
										<th>Nama Supplier</th>
										<th>Kadaluarsa</th>
										<th>Qty</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($result as $result): ?>
									<tr>
										<td><?= $result[0]['nama_produk'] ?></td>
										<td><?= $result[0]['nama_supplier'] ?></td>
										<td><?= $result[0]['kadaluarsa'] ?></td>
										<td><?= count($result) ?></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>						
								
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