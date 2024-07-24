<?php
include 'koneksi.php';
$id = $_GET['id'];
$mahasiswa = mysqli_query($koneksi, "select * from mahasiswa where id_mhs='$id'");
$row = mysqli_fetch_array($mahasiswa);
// membuat data jurusan menjadi dinamis dalam bentuk array
$jurusan = array('TEKNIK INFORMATIKA', 'TEKNIK ELEKTRO', 'REKAMEDIS');
// membuat function untuk set aktif radio button
function active_radio_button($value, $input) {
    // apabila value dari radio sama dengan yang di input
    $result = $value == $input ? 'checked' : '';
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form method="post" action="edit.php">
            <input type="hidden" value="<?php echo $row['id_mhs'];?>" name="id_mhs">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" value="<?php echo $row['nim'];?>" name="nim">
            </div>
            <div class="form-group">
                <label for="nama">NAMA</label>
                <input type="text" class="form-control" id="nama" value="<?php echo $row['nama'];?>" name="nama">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">JENIS KELAMIN</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin'])?>>
                        <label class="form-check-label" for="laki_laki">Laki Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin'])?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jurusan">JURUSAN</label>
                <select class="form-control" id="jurusan" name="jurusan">
                    <?php foreach ($jurusan as $j): ?>
                        <option value="<?php echo $j; ?>" <?php echo ($row['jurusan'] == $j) ? 'selected' : ''; ?>><?php echo $j; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">ALAMAT</label>
                <input type="text" class="form-control" id="alamat" value="<?php echo $row['alamat'];?>" name="alamat">
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
