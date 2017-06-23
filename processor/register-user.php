<?php
require '../config/db-config.php';
require '../config/constant-config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username_post = $_POST["USERNAME"];
  $name_post = $_POST["NAME"];
  $email_post = $_POST["EMAIL"];
  $password_post = $_POST["PASSWORD"];
  $umur_post = $_POST["UMUR"];
  $kota_post = $_POST["KOTA"];
  $gender_post = $_POST["GENDER"];
  $image_url = "https://t3.ftcdn.net/jpg/00/64/67/52/240_F_64675209_7ve2XQANuzuHjMZXP3aIYIpsDKEbF5dD.jpg";
  

  $sql = "INSERT INTO usertable
  VALUES ('', '$username_post', '$email_post', '$password_post', '$image_url', '$name_post', 'none', '$kota_post', '$umur_post', '$gender_post', '10', '10')";

  $result = $conn->query($sql);
  
  $sql = "SELECT * FROM usertable WHERE USERNAME = '$username_post' AND PASSWORD = '$password_post'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      // save user info to session
      session_start();
      $_SESSION["isLoggedIn"] = True;
      $_SESSION["username"] = $row["USERNAME"];
      $_SESSION["id_user"] = $row["ID_USER"];
    }
    header('Location: '.URL.'home.php', TRUE, 302);
  } else {
    echo "unable to login";
  }
}
?>