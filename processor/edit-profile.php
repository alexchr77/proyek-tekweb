<?php
require '../config/db-config.php';
require '../config/constant-config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $image_post = $_POST["postImage"];
  $nama_post = $_POST["postNama"];
  $umur_post = $_POST["postUmur"];
  $gender_post = $_POST["postGender"];
  $kota_post = $_POST["postKota"];
  $idsession = $_SESSION["id_user"];

  $sql = "UPDATE usertable SET IMAGE_URL = '$image_post', NAMA = '$nama_post', UMUR = '$umur_post', GENDER = '$gender_post', KOTA = '$kota_post' WHERE ID_USER = '$idsession'";
  $result = $conn->query($sql);

  // var_dump($sql);
  header('Location: '.URL.'profile.php', TRUE, 302);

  $conn->close();
}
?>