<?php


include "koneksi.php";

$username = $_GET['username'];
$password = $_GET['password'];
  
$sql_user = mysqli_query($db, "SELECT * FROM user WHERE username = '$username' and password='$password'");
$user = mysqli_fetch_assoc($sql_user);
$sql_profile = mysqli_query($db, "SELECT * FROM profile WHERE username = '" . $user["username"] . "'");
$profile = mysqli_fetch_assoc($sql_profile);

session_start();

if(count($user) == 0) {
  echo "<div align='center'>Username Belum Terdaftar! <a href='index.php'>Back</a></div>";
} else {
  if($password <> $user['password']) {
    echo "<div align='center'>Password salah! <a href='index.php'>Back</a></div>";
  } else {
    $_SESSION["user"] = $user;
    $_SESSION["profile"] = $profile;
    header('location:feed.php');
  }
}
?>