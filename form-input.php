<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Form Inputan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2 class="text-center">Form Pendaftaran Mahasiswa</h2>
    <form action="simpan.php" method="post" class="row g-3 needs-validation" novalidate>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" onkeyup="isi_otomatis()">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Jenis Kelamin</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Laki-laki
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Perempuan
            </label>
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Jurusan</label>
        <select name="jurusan" id="" class="form-control">
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Alamat</label>
        <textarea name="alamat" id="" cols="5" rows="5" class="form-control"></textarea>
    </div>
    <div class="d-flex">
        <div class="p-2 flex-grow-1">
            <a href="index.php" class="btn btn-danger">Kembali</a>
        </div>
        <div class="p-2">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<script>
    function isi_otomatis() {
        var nim = document.getElementsByName('nim').value;
        var nama = document.getElementsByName('nama').value;

        if (nim.length == 8) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var hasil = xhr.responseText;
                    var json = JSON.parse(hasil);

                    document.getElementsByName('nama').value = json.nama;
                }
            }
            xhr.open('GET', 'get_data.php?nim='+nim, true);
            xhr.send();
        }
    }
</script>