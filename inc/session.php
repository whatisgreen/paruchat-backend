<?php 
    session_start();
    $login;
    if(isset($_SESSION['username'])){
        $login = true;
    }else{
        $login = false;
    }
?>