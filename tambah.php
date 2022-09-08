<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
require 'functions.php';

// cek apakah tombol submit sudah ditekan apa belum
if( isset($_POST["submit"]) ) {
	

	// cek apakah data berhasil ditambahkan
	if( tambah($_POST) > 0 ) {
		echo "
              <script>
              alert('data berhasil ditambahkan!');
              document.location.href = 'index.php'
              </script>  
            ";
	} else {
		echo "
              <script>
              alert('data gagal ditambahkan!');
              document.location.href = 'index.php'
              </script>  
		";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Obat</title>
</head>
<body>

<h1>Tambah data Obat</h1>

<form action="" method="post" enctype="multipart/form-data">
	<ul>
		<li>
			<label for="nama">Nama Obat : </label>
			<input type="text" name="nama" id="nama">
		</li>
		<li>
			<label for="kodeobat">Kode Obat : </label>
			<input type="text" name="kodeobat" id="kodeobat">
		</li>
		<li>
			<label for="kategori">Kategories : </label>
			<input type="text" name="kategori" id="kategori" required>
		</li>
		<li>
			<label for="deskripsi">Deskripsi : </label>
			<input type="text" name="deskripsi" id="deskripsi">
		</li>
		<li>
			<label for="gambar">Gambar : </label>
			<input type="file" name="gambar" id="gambar">
		</li>
		<li>
			<button type="submit" name="submit">Tambah Data!</button>
		</li>
	</ul>
</form>

</body>
</html>