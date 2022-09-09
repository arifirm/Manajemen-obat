<?php 
sleep(1);
require '../functions.php';

$keyword = $_GET["keyword"];

$query ="SELECT * FROM apotik 
	           WHERE
	           nama LIKE '%$keyword%' OR
	           kodeobat LIKE '%$keyword%'
	           ";
$apotik = query($query);
?>
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