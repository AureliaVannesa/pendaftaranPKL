<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="cs.css">
</head>

<?php
include 'db.php';

if (isset($_POST['nama_calon'])) {
    $nama_calon = $_POST['nama_calon'];
    $alamat = $_POST['alamat'];
    $asal = $_POST['asal'];
    $no_telpon = $_POST['no_telpon'];

    
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $filename = basename($_FILES["foto"]["name"]);
        $tempname = $_FILES["foto"]["tmp_name"];
        $folder = "../database/img/" . $filename;

        if (!is_dir("../database/img/")) {
            mkdir("../database/img/", 0777, true);
        }

        $query = "INSERT INTO calon (nama_calon, alamat, asal, no_telpon, foto) VALUES ($1, $2, $3, $4, $5)";
        $result = pg_query_params($conn, $query, array($nama_calon, $alamat, $asal, $no_telpon, $filename));

        if ($result) {
            if (move_uploaded_file($tempname, $folder)) {
                echo '<script>alert("Data berhasil ditambahkan!"); location.href="profile.php";</script>';
            } else {
                echo '<script>alert("Gagal mengunggah foto!");</script>';
            }
        } else {
            echo '<script>alert("Gagal menambahkan data: ' . pg_last_error($conn) . '");</script>';
        }
    } else {
        echo '<script>alert("Foto tidak ditemukan atau ada masalah saat unggah.");</script>';
    }
}
?>

<div>
<form method="post" enctype="multipart/form-data" class="container">
    <h1>Masukkan Biodata</h1>
    Foto <input type="file" name="foto" required><br>
    Nama Lengkap <input type="text" name="nama_calon" required><br>
    Alamat <input type="text" name="alamat" required><br>
    Nomor Telepon <input type="text" name="no_telpon" required><br> 
    Asal Sekolah <input type="text" name="asal" required><br>
    <div class="btn-group">
        <button type="submit">Tambah</button>
        <button><a href="profile.php">Kembali</a></button>
    </div>
</form>
</div>