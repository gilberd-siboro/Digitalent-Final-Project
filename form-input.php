<!DOCTYPE html>
<html>
<head>
    <title>Membuat Form Inputan Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Form Input Data Mahasiswa</h2>
        <form method="post" action="simpan.php">
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" onkeyup="isi_otomatis()" name="nim">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">JENIS KELAMIN</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L">
                        <label class="form-check-label" for="laki_laki">Laki Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-2 col-form-label">JURUSAN</label>
                <div class="col-sm-10">
                    <select class="form-control" id="jurusan" name="jurusan">
                        <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK MESIN">TEKNIK MESIN</option>
                        <option value="TEKNIK KIMIA">TEKNIK KIMIA</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
