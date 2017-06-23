<?php
$db_servername = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name = "yustusdb";

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>