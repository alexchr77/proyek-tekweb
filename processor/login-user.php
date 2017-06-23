<?php
require '../config/db-config.php';
require '../config/constant-config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username_post = $_POST["username"];
  $password_post = $_POST["password"];

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
    echo "Username/Password Salah";
  }
  $conn->close();
}
?>