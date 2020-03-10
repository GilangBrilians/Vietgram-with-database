<?php
include "koneksi.php";

$query_profile = ("UPDATE profile SET username = '" . $_GET["username"] . "', name = '" . $_GET["name"] . "', website = '" . $_GET["website"] . "' , 
bio = '" . $_GET["bio"] . "' , email = '" . $_GET["email"] . "' , phone = '" . $_GET["phone"] . "' , gender = '" . $_GET["gender"] . "' ");
$profile = mysqli_query($db, $query_profile);

$query_user = ("UPDATE user SET username = '" . $_GET["username"] . "', email = '" . $_GET["email"] . "'");
$user = mysqli_query($db, $query_user);

session_start();
$_SESSION["user"]["username"] = $_GET["username"];
$_SESSION["user"]["email"] = $_GET["email"];
$_SESSION["profile"] = $_GET;
header('Location: profile.php');
?>