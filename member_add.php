<?php 
    $name = $_POST['name']; 
    $email = $_POST['mail']; 
    $pass = $_POST['pass']; 
    htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');
    
    $pass = md5($pass);
    
$dsn = 'mysql:dbname=study;host=localhost;charset=utf8'; 
$user = 'root'; 
$password = ''; 

try{ 
    $dbh = new PDO($dsn, $user, $password); 
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "INSERT INTO members (name, email, password, created) VALUE (:name, :email, :password, :created)"; 
    $stmt = $dbh->prepare($sql); 
    $stmt->bindValue(':name', $name, PDO::PARAM_STR); 
    $stmt->bindValue(':email', $email, PDO::PARAM_STR); 
    $stmt->bindValue(':password', $pass, PDO::PARAM_STR); 
    
    $now = date('Y/m/d H:i:s');
    
    $stmt->bindValue(':created', $now, PDO::PARAM_STR); 
    $stmt->execute(); 
    header( "Location: ./index.php" ) ;
    echo '処理が終了しました。';
}catch (PDOException $e){ 
    echo($e->getMessage()); 
    die(); 
}