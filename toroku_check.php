<?php
    session_start();
    $name = $_POST['name'];
    echo $name;
    $email = $_POST['mail']; 
    $pass = $_POST['pass']; 
    
    $errorFlag = false;
    
    if($name == ""){ $errorFlag = true; }
    if($mail == ""){ $errorFlag = true; }
    if($pass == "" || strlen ($pass)<5){ $errorFlag = true; }