<?php 
    session_start();
    
    $email = $_POST['mail']; 
    $pass = $_POST['pass']; 
    htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');
    $pass = md5($pass);
    
    $dsn = 'mysql:dbname=mini_bbs;host=localhost;charset=utf8'; 
    $user = 'root'; 
    $password = ''; 
    
    $LoginNinsyoLowCount = 0;
    $errorMessage = "";
    try{ 
        $dbh = new PDO($dsn, $user, $password); 
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $stmt = $dbh->prepare('SELECT * FROM members WHERE email=? AND password=?');
        //$stmt = $dbh->prepare('SELECT COUNT(*) AS rowcount,name FROM members WHERE email=? AND password=?');
        //$stmt = $dbh->prepare($sql); 
        $stmt->bindValue(1, $email, PDO::PARAM_STR); 
        $stmt->bindValue(2, $pass, PDO::PARAM_STR); 
        $stmt->execute();
        
        $name = "";
        foreach ($stmt as $data) {
            //$LoginNinsyoLowCount = $data['rowcount'];
            $id = $data['id'];
            $name = $data['name'];
        }
        
        //if($LoginNinsyoLowCount === 1){
        if($name != ""){
            $_SESSION['name'] = $name;
            $_SESSION['member_id'] = $id;
            header( "Location: ./toppage.php" ) ;
        }
        else{
            $errorMessage = "メールアドレスかパスワードが間違っています。";
            $_SESSION['errorMessage'] = $errorMessage;
            $_SESSION['mail'] = $email;
            
            header( "Location: ./index.php" ) ;
        }
    }catch (PDOException $e){ 
        echo($e->getMessage()); 
        die(); 
    }