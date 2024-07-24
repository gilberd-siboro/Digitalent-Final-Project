<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Animasi untuk tombol "Edit" dan "Delete" */
        .btn-edit, .btn-delete {
            transition: transform 0.3s ease;
        }

        .btn-edit:hover, .btn-delete:hover {
            transform: scale(1.1);
        }

        /* Animasi untuk baris tabel */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .table tbody tr {
            animation: fadeIn 0.5s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>List Mahasiswa</h2>
        <a href="form-input.php" class="btn btn-primary mb-3">Tambah Data</a>
        <a href="cetak-pdf.php" class="btn btn-success mb-3">Cetak</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'koneksi.php';
                $mahasiswa  = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                $no = 1;
                foreach ($mahasiswa as $row) {
                    $jenis_kelamin = $row['jenis_kelamin'] == 'P' ? 'Perempuan': 'Laki laki';
                    echo "<tr>
                        <td>$no</td>
                        <td>" .$row['nim']."</td>
                        <td>" .$row['nama']."</td>
                        <td>" .$jenis_kelamin. "</td>
                        <td>" .$row['jurusan']."</td>
                        <td>
                            <a href='form-edit.php?id=$row[id_mhs]' class='btn btn-warning btn-sm btn-edit mr-1'>Edit</a>
                            <a href='delete.php?id_mhs=$row[id_mhs]' class='btn btn-danger btn-sm btn-delete'>Delete</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
