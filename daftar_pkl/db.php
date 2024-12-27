<?php
$host = "localhost";
$dbname = "pkl_db";
$user = "postgres";
$password = "postgres";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if(!$conn){
    die("Terjadi Kesalahan: " . pg_last_error());
}

?>