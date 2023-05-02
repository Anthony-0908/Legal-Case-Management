<?php
include('connecntion.php');
session_start();
if(session_destroy()){
    unset($_SESSION['admin']);
    header("location: index.php");
    exit();

}


?>
