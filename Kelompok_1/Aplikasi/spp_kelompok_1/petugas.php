<?php
require_once("require.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Data Petugas</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
			body{
				background-image: url(image-3.jpg);
				background-size: cover;
				color: #000;
			}
			h1{
				margin-top: 100px;
			}
			.logo{
				box-shadow:#333 0px 0px 20px; margin:20px; padding:10px;
			}
		</style>
</head>
<body>
	<!-- Panggil script header -->
	<?php require_once("header.php"); ?>
	<!-- Isi Konten -->
	<h3>Petugas</h3>
	<p><a href="tambah_petugas.php">Tambah Data</a></p>
	<table cellspacing="0" border="1" cellpadding="5">
		<tr>
			<td>No.</td>
			<td>Username</td>
			<td>Password</td>
			<td>Nama Petugas</td>
			<td>Level</td>
			<td>Aksi</td>
		</tr>
		<?php
		// Kita panggil tabel petugas
		$sql = mysqli_query($db, "SELECT * FROM petugas WHERE not username='$username'");
		$no = 1;
		while($r = mysqli_fetch_assoc($sql)){ ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $r['username']; ?></td>
				<td><?= $r['password']; ?></td>
				<td><?= $r['nama_petugas']; ?></td>
				<td><?= $r['level']; ?></td>
				<td><a href="?hapus&id_petugas=<?= $r['id_petugas'];?>">Hapus</a>
					<a href="edit_petugas.php?id_petugas=<?= $r['id_petugas']; ?>">Edit</a></td>
			</tr>
		<?php $no++; }?>
	</table>
	<hr/>
	<?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
	$id_petugas = $_GET['id_petugas'];
	$hapus = mysqli_query($db, "DELETE FROM petugas WHERE id_petugas='$id_petugas'");
	if($hapus){
		header("Location: petugas.php");
	}else{
		echo "<script>alert('Maaf, data tesebut masih terhubung dengan data yang lain');</script>";
	}
}

?>