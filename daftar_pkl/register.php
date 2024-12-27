<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styl.css">
</head>


<?php
include "db.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    $query = "INSERT INTO users (username, password, email, name) VALUES ('$username', '$password', '$email', '$name')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo '<script>alert("Selamat Datang!"); location.href="login.php" </script>';
    } else {
        echo '<script>alert("Terjadi kesalahan: ' . pg_last_error($conn) . '");</script>';
    }
}
?>


<h3>Register</h3>
<form method="post">
        Nama Lengkap <input type="text" id="name" name="name" placeholder="Nama Lengkap" required /><br>
        Username <input type="text" id="username" name="username" placeholder="Username" required /><br>
        Email <input type="email" id="email" name="email" placeholder="Email" required /><br>
        Password <input type="password" id="password" name="password" placeholder="Password" required /><br>
    <button class="btn" type="submit">Register</button>
</form>

