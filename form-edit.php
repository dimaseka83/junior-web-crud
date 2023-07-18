<?php 
include 'koneksi.php';
$id_mhs = $_GET['id_mhs'];
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mhs='$id_mhs'");
$row = mysqli_fetch_array($mahasiswa);
$jurusan = array('Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer');
function active_radio_button($value, $input) {
    $result = $value==$input?'checked':'';
    return $result;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membuat Form Editan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2 class="text-center">Form Edit Mahasiswa <?php echo $row['nama']; ?> </h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id_mhs" value="<?php echo $row['id_mhs']; ?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="<?php echo $row['nim']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="flexRadioDefault1" <?php echo active_radio_button("L", $row['jenis_kelamin']) ?>>
                <label class="form-check-label" for="flexRadioDefault1">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="flexRadioDefault2" <?php echo active_radio_button("P", $row['jenis_kelamin']) ?>>
                <label class="form-check-label" for="flexRadioDefault2">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Jurusan</label>
            <select name="jurusan" id="" class="form-control">
            <?php foreach ($jurusan as $j) { ?>
                <option value="<?php echo $j; ?>" <?php echo $row['jurusan']==$j?'selected="selected"':''; ?>><?php echo $j; ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Alamat</label>
            <textarea name="alamat" id="" cols="5" rows="5" class="form-control"><?php echo $row['alamat']; ?></textarea>
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