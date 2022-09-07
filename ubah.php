<?php
session_start();
require 'functions.php';

// ambil data diURL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM apotik WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan apa belum
if( isset($_POST["submit"]) ) {
	

	// cek apakah data berhasil diubah
	if( ubah($_POST) > 0 ) {
		echo "
              <script>
              alert('data berhasil diubah!');
              document.location.href = 'index.php'
              </script>  
            ";
	} else {
		echo "
              <script>
              alert('data gagal diubah!');
              document.location.href = 'index.php'
              </script>  
		";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data obat</title>
</head>
<body>

<h1>Ubah data obat</h1>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
	<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
	<ul>
		<li>
			<label for="nama">Nama Obat : </label>
			<input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>">
		</li>
		<li>
			<label for="kategori">Kategories : </label>
			<input type="text" name="kategori" id="kategori" required value="<?= $mhs["kategori"] ?>">
		</li>
		<li>
			<label for="deskripsi">Deskripsi : </label>
			<input type="text" name="deskripsi" id="deskripsi" value="<?= $mhs["deskripsi"] ?>">
		</li>
		<li>
			<label for="gambar">Gambar : </label>
			<img src="img/<?= $mhs['gambar']; ?>" width="40"> <br>
			<input type="file" name="gambar" id="gambar">
		</li>
		<li>
			<button type="submit" name="submit">Ubah Data!</button>
		</li>
	</ul>
</form>

</body>
</html>