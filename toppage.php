<?php 
    session_start();
    if (!isset($_SESSION["name"])) {
        header('Location: ./index.php');
        exit;
    }
    echo $_SESSION["name"];
    echo "login成功";
?>
<!doctype html> 
<html> 
<head> 
<title>投稿画面</title> 
</head> 
<body> 
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
        </dd> 
        </dl> 
        <div> 
        <input type="submit" value="投稿する" /> 
        </div> 
        </form> 
  </div> 
</div> 
<a href="logout.php">ログアウト</a>
</body> 
</html>