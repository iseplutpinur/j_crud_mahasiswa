<?php
session_start();

$dbhost = "localhost";
$dbuser = "almardiy_j_handip";
$dbpass = "almardiy_j_handip";
$dbname = "almardiy_j_handip";

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
