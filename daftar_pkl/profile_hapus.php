<?php
include 'db.php';

$id = $_GET['id'];

if ($id) {
    $query = pg_query_params($conn, "DELETE FROM calon WHERE calon_id = $1", array($id));

    if ($query) {
        echo '<script>alert("Data berhasil dihapus."); location.href="profile.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data."); location.href="profile.php";</script>';
    }
} else {
    echo '<script>alert("ID tidak ditemukan."); location.href="profile.php";</script>';
}

pg_close($conn);
?>
