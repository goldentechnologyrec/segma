<?php
session_start();
if(!(isset($_SESSION['PROFILE']))){
        header("location:login_index.php");
}
?>
