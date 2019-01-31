<?php 
    session_start();
    if (!isset($_SESSION["name"])) {
        header('Location: ./index.php');
        exit;
    }
    
    $msg = $_POST['message']; 
    htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
    
    $dsn = 'mysql:dbname=mini_bbs;host=localhost;charset=utf8'; 
    $user = 'root'; 
    $password = ''; 
    try{ 
        $dbh = new PDO($dsn, $user, $password); 
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $stmt = $dbh->prepare('INSERT INTO posts SET name=?,email=?,password=?, picture=?, created=NOW()'); 
        //$stmt = $dbh->prepare($sql); 
        $stmt->bindValue(1, $name, PDO::PARAM_STR); 
        $stmt->bindValue(2, $email, PDO::PARAM_STR); 
        $stmt->bindValue(3, $pass, PDO::PARAM_STR); 
        $stmt->bindValue(4, "", PDO::PARAM_STR); 
        
        //$now = date('Y/m/d H:i:s');
        
        //$stmt->bindValue(':created', $now, PDO::PARAM_STR); 
        $stmt->execute(); 
        header( "Location: ./toroku_complete.php" ) ;
        echo '処理が終了しました。';
    }catch (PDOException $e){ 
        echo($e->getMessage()); 
        die(); 
    }
?>