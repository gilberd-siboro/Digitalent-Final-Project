<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$id_mhs = $_POST['id_mhs'];
// query SQL untuk insert data
$query="
UPDATE mahasiswa 
SET nim='$nim', 
nama='$nama', 
jurusan='$jurusan',
jenis_kelamin='$jenis_kelamin', 
alamat='$alamat'
WHERE id_mhs= '$id_mhs'
";

mysqli_query($koneksi, $query);

header("Location: index.php");
?>