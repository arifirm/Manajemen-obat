<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// koneksi ke database
require 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kategori obat</title>
</head>
<body>

	<h2>Kategori Obat</h2>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<!-- <th>No</th> -->
			<th>Nama kategori</th>
<!-- 			<th>Aksi</th> -->
		</tr>
	</thead>
	<tbody>
		<!-- <?php 
		//$kate = $kategori > tampil_kategori();
		//print_r($kate);
		?> -->
		<tr>
			<td>>> Kapsul</td>
			
			<!-- <td>
				<a href="">ubah</a>
				<a href="">hapus</a>
			</td> -->
		</tr>
		<tr><td>>> Sirup</td></tr>
		<tr><td>>> Tablet</td></tr>
	</tbody>
</table>

</body>
</html>
