<?php 
    session_start();
    if (!isset($_SESSION["name"])) {
        header('Location: ./index.php');
        exit;
    }
    
    $message = $_POST['message'];
    $reply_post_id = 0;
    if($_POST['isReply']==="no")
    {
        $reply_post_id = 0;
    }
    htmlspecialchars($messagesg, ENT_QUOTES, 'UTF-8');
    
    $dsn = 'mysql:dbname=mini_bbs;host=localhost;charset=utf8'; 
    $user = 'root'; 
    $password = ''; 
    
    $member_id = $_SESSION['member_id'];
    try{ 
        $dbh = new PDO($dsn, $user, $password); 
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $stmt = $dbh->prepare('INSERT INTO posts SET message=?,member_id=?,reply_post_id=?, created=NOW() ,modified=NOW()'); 
        //$stmt = $dbh->prepare($sql); 
        $stmt->bindValue(1, $message, PDO::PARAM_STR); 
        $stmt->bindValue(2, $member_id, PDO::PARAM_INT); 
        $stmt->bindValue(3, $reply_post_id, PDO::PARAM_INT); 
        
        //$now = date('Y/m/d H:i:s');
        
        //$stmt->bindValue(':created', $now, PDO::PARAM_STR); 
        $stmt->execute(); 
        header( "Location: ./toppage.php" ) ;
        echo '処理が終了しました。';
    }catch (PDOException $e){ 
        echo($e->getMessage()); 
        die(); 
    }
?>