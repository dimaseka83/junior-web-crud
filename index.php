<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mhs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="text-center">List Mahasiswa</h2>
        <div class="d-flex flex-row-reverse">
            <a href="form-input.php" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>
        <table class="table">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Jurusan</th>
            </tr>
            <?php 
            include 'koneksi.php';
            $mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
            $no = 1;
            foreach ($mahasiswa as $row) {
                $jenis_kelamin = $row['jenis_kelamin']=='P'?'Perempuan':'Laki-laki';
                echo "<tr>
                    <td>$no</td>
                    <td>".$row['nim']."</td>
                    <td>".$row['nama']."</td>
                    <td>".$jenis_kelamin."</td>
                    <td>".$row['jurusan']."</td>
                    <td>
                        <a href='form-edit.php?id_mhs=".$row['id_mhs']."'>Edit</a>
                        <a href='delete.php?id_mhs=".$row['id_mhs']."'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>