<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="cs.css">
</head>

<?php
include "db.php";

$id = $_GET['id'];

$query = "SELECT * FROM calon WHERE calon_id = $1";
$result = pg_query_params($conn, $query, array($id));

if (!$result || pg_num_rows($result) == 0) {
    echo '<script>alert("Data tidak ditemukan!"); location.href="profile.php";</script>';
    exit();
}

$data = pg_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_calon = $_POST['nama_calon'];
    $alamat = $_POST['alamat'];
    $asal = $_POST['asal'];
    $no_telpon = $_POST['no_telpon'];
    $foto = $data['foto']; 

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $filename = basename($_FILES["foto"]["name"]);
        $tempname = $_FILES["foto"]["tmp_name"];
        $folder = "../database/img/" . $filename;

        if (!is_dir("../database/img/")) {
            mkdir("../database/img/", 0777, true);
        }

        if (move_uploaded_file($tempname, $folder)) {
            $foto = $filename;
        } else {
            echo '<script>alert("Gagal mengunggah foto!");</script>';
        }
    }

    $query = "UPDATE calon SET nama_calon = $1, alamat = $2, asal = $3, no_telpon = $4, foto = $5 WHERE calon_id = $6";
    $result = pg_query_params($conn, $query, array($nama_calon, $alamat, $asal, $no_telpon, $foto, $id));

    if ($result) {
        echo '<script>alert("Data berhasil diperbarui!"); location.href="profile.php";</script>';
    } else {
        echo '<script>alert("Gagal memperbarui data: ' . pg_last_error($conn) . '");</script>';
    }
}
?>

<div>
    <form method="post" enctype="multipart/form-data" class="container">
        <h1>Edit Biodata</h1>

        <label>Foto:</label>
        <img src="../database/img/<?php echo $data['foto']; ?>" alt="Foto" style="max-width: 100px; max-height: 100px;"><br>
        <input type="file" name="foto"><br>
        
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_calon" value="<?php echo $data['nama_calon']; ?>" required><br>
        
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required><br>
        
        <label>Asal Sekolah:</label>
        <input type="text" name="asal" value="<?php echo $data['asal']; ?>" required><br>
        
        <label>Nomor Telepon:</label>
        <input type="text" name="no_telpon" value="<?php echo $data['no_telpon']; ?>" required><br> 
        
        <button type="submit">Update</button>
        <button><a href="profile.php">Kembali</a></button>
    </form>
</div>