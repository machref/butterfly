<?php
session_start();
$_SESSION['username']="Ahmed";
$_SESSION['password']="AZERTY123";
$_SESSION['email']="ahmed@gmail.com";
echo "session data is saved";
?>