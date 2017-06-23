<?php
session_start();
require '../config/db-config.php';
require '../config/constant-config.php';

  $umur_min = $_POST['umur1'];
  $umur_max = $_POST['umur2'];
  $city = $_POST['kota'];
  $gender = $_POST['gender'];

  $sql = "SELECT * FROM usertable WHERE UMUR >= $umur_min AND UMUR <= $umur_max AND KOTA = '$city' AND GENDER = '$gender' ORDER BY LIKE ASC, DISLIKE DESC";
  $result = $conn->query($sql);

  header('Location: ../story.php');
?>