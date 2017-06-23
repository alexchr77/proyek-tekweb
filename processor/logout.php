<?php
require '../config/db-config.php';
require '../config/constant-config.php';

session_start();

session_unset();
session_destroy();
header('Location: '.URL.'login.php', TRUE, 302);
?>