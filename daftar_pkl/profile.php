<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>


<?php
include 'db.php';
?>

<div class="container">
    <h1>Profile</h1>
    <hr>
    <a href="profile_tambah.php" class="add-button">+ Tambah Data</a>

    <?php
    $query = "SELECT * FROM calon";
    $result = pg_query($conn, $query);

    if (!$result) {
        echo "<p>Error: " . pg_last_error($conn) . "</p>";
    } else {
        if (pg_num_rows($result) > 0) {
            while ($data = pg_fetch_assoc($result)) {
                ?>
                <div class="profile-card">
                    <p><img src="../database/img/<?php echo$data['foto'];?>" class="photo" alt="foto"></p>
                    <h3><?php echo $data['nama_calon']; ?></h3>
                    <p><strong>Alamat:</strong> <?php echo $data['alamat']; ?></p>
                    <p><strong>No Telepon:</strong> <?php echo $data['no_telpon']; ?></p>
                    <p><strong>Asal Sekolah:</strong> <?php echo $data['asal']; ?></p>
                    <div class="actions">
                        <a href="profile_hapus.php?id=<?php echo $data['calon_id']; ?>" class="delete-button">Hapus</a>
                        <a href="profile_ubah.php?id=<?php echo $data['calon_id']; ?>" class="edit-button">Ubah</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>Silahkan masukkan data.</p>";
        }
    }
    ?>
</div>

</body>
</html>