<?php 
    session_start();
    $name = $_POST['name']; 
    $email = $_POST['mail']; 
    $pass = $_POST['pass']; 
    htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');
    
    if(mb_strlen($pass)>3){
        
    }