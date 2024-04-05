<?php
session_start();

function checkLogin(){
    if(!isset($_SESSION['userID'])){
        header("Location: #");
        die();
    }else{
        return true;
    }
}
?>