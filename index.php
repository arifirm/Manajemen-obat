<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// koneksi ke database
require 'functions.php';

//pagination
//konfigurasi
$jumlahdataperhalaman = 5;
$jumlahData = count(query("SELECT * FROM apotik"));
$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);
$halamanAktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;

if (isset($_GET["filtercategory"])) {
	$kategori = $_GET["kategori"];

	$outputArtikel = query("SELECT * FROM apotik WHERE kategori = '$kategori' ");
} else {
	$outputArtikel = query("SELECT * FROM apotik LIMIT $awalData, $jumlahdataperhalaman");
}

$apotik = $outputArtikel;


// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$apotik = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Daftar Obat</h1>

<a href="tambah.php">Tambah data obat</a>
<br><br>

<style>
		.loader {
			width: 100px;
			position: absolute;
			top: 118px;
			left: 230px;
			z-index: -1;
			display: none;
		}
	</style>
	<script src="js/jquery-3.6.1.min.js"></script>
	<script src="js/script.js"></script>

<form action="" method="post">
	<input type="text" name="keyword" size="30" autofocus placeholder="Search" autocomplete="off" id="keyword">
	<button type="submit" name="cari" id="tombol-cari">cari!</button>

    <img src="img/loader.gif" class="loader">

</form>
<br>

<form action="" method="get">
	<ul>
		<li>
			<label for="kategori">Kategori :</label>
			<input type="text" name="kategori" id="kategori">
		</li>
		<li><button type="submit" name="filtercategory">Filter</button></li>
	</ul>
	
</form>

<!-- navigasi -->
<?php if( $halamanAktif > 1 ) : ?>
<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
	<?php if($i == $halamanAktif ) : ?>
	<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
	<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<br>
<a href="kategori.php">Kategori Obat Yang Ada</a>

<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>Nama</th>
		<th>Kode Obat</th>
		<th>Kategori</th>
		<th>Deskripsi</th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach( $apotik as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
		<td><?= $row["nama"] ?></td>
		<td><?= $row["kodeobat"] ?></td>
		<td><?= $row["kategori"] ?></td>
		<td><?= $row["deskripsi"] ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
</table>
</div>

</body>
</html>