<?php
session_start();

$conn = new mysqli("localhost", "root" , "", "new_legalcase");

if($conn == FALSE){
    echo "error";
}


?>
