<?php
session_start();

$dbhost = "127.0.0.1:3307";
$dbuser = "root";
$dbpass = "1008";
$dbname = "mahasiswa";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

function cek_login()
{
  $result = isset($_SESSION['login']) ? $_SESSION['login'] : false;
  if (!$result) {
    header("Location: login.php");
    exit;
  }
  return $result;
}
