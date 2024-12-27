<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styl.css">
</head>


<?php
session_start();
include 'db.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * from users where username='$username' and password='$password'";
    $result = pg_query($conn,$query);
    $user = pg_fetch_assoc($result);

    if( $result ){
        $data = pg_fetch_array($result);
        $_SESSION['users'] = $data;
        echo '<script>alert("Selamat Datang!");  location.href="profile.php"</script>';
    }else{
        echo '<script>alert("Username/password salah!");</script>';
    }
}
?>

<h3>Login</h3>
<form method="POST" action="">
    username  <input type="text" name="username" required><br>
    password  <input type="password" name="password" required>
    <button class="btn" type="submit">Login</button>
</form>