<?php 
    session_start();
    if (!isset($_SESSION["name"])) {
        header('Location: ./index.php');
        exit;
    }
    echo "ログイン中[".$_SESSION["name"]."]さん";
?>
<!doctype html> 
<html> 
<head> 
<title>投稿画面</title> 
</head> 
<body> 
<a href="logout.php">ログアウト</a>
<div id="wrap"> 
  <div id="head"> 
    <h1>簡易掲示板</h1> 
  </div> 
  <div id="content"> 
        <form action="post.php" method="post"> 
        <dl> 
            <dt><?php echo "メッセージをどうぞ" ?></dt> 
        <dd> 
        <textarea name="message" cols="50" rows="5"></textarea> 
        <input type="hidden" name="isReply" value="no">
        </dd> 
        </dl> 
        <div> 
        <input type="submit" value="投稿する" /> 
        </div> 
        </form> 
  </div> 
  
  <?php 

    $dsn = 'mysql:dbname=mini_bbs;host=localhost;charset=utf8';  
    $user = 'root';  
    $password = '';  
    try{  
        $dbh = new PDO($dsn, $user, $password);  
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        $sql = "SELECT * FROM posts";  
        $stmt = $dbh->query($sql); 

    }catch (PDOException $e){  
        echo($e->getMessage());  
        die(); 
    }
  ?>
<table> 

    <tr><th>メッセージ</th><th>メンバーID</th><th>返信先ID</th><th>投稿日時</th></tr> 

    <?php  

        foreach ($stmt as $data) { 

            echo '<tr><td>'.$data['message'].'</td><td>'.$data['member_id'].'</td><td>'.$data['reply_post_id'].'</td><td>'.$data['created']."</td></tr>"; 

        } 

    ?> 

</table>
  
</div> 
</body> 
</html>