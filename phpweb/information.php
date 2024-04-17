<?php
if(isset($_SESSION['username'])){
session_start();
echo "welcome".$_SESSION['username'];
}else {
echo "veuillez vous reconnecter";
}
?>