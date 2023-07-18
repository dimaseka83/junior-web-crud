<?php 
    include 'koneksi.php';
    
    $id_mhs = $_GET['id_mhs'];

    $query = "DELETE FROM mahasiswa WHERE id_mhs='$id_mhs'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus!');window.location='index.php';</script>";
    }

    header("location:index.php");
?>