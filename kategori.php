<?php
include '_koneksi.php';
include '_method.php';

cek_session();

$sql = "SELECT * FROM kategori";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $kategori[] = $row;
  }
} else {
  echo "0 results";
}
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
						<h1 class="h3 mb-0 text-gray-800">Kategori</h1>
						<a href="kategori_tambah.php" class="btn btn-success shadow-sm">
						<i class="fas fa-plus mr-1"></i> Tambah Kategori</a>
					</div>
					
					<div class="container">
						<div class="row bg-white">
							<table class="table table-bordered" id="dataTable" cellspacing="0">
								<thead class="table-dark">
									<tr>
										<th>No</th>
										<th>Nama Kategori</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($kategori as $kategori): ?>
									<tr>
										<td><?= $kategori['id_kategori'] ?></td>
										<td><?= $kategori['nama_kategori'] ?></td>
										<td>
											<!--<button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>-->
											<a href="kategori_delete_go.php?id_kategori=<?= $kategori['id_kategori'] ?>"><button type="button" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
										</td>
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