<?php 
    session_start();
    $name = "";
    $mail = "";
    if(isset($_GET['r']))
    {
        if(isset($_GET['name'])){ $name = $_GET['name']; } 
        
    }
?>
<!DOCTYPE html>
<head>
    <title>会員登録</title>
</head>
<body>
<h1>会員登録</h1> 
<p><?php echo date('Y/m/d H:i:s'); ?></p>
<form action="member_add.php" method="post">
ニックネーム<input type="text" name="name" value=""><br>
メールアドレス<input type="text" name="mail" value=""><br>
パスワード<input type="password" name="pass"><br>
<input type="submit" value="登録"> 
</form>
</body>

<!-- 後で揃える
<ul>
    <li>名前<input type="text" name="name"></li>
    <li>Email<input type="text" name="mail"></li>
    <li>パスワード<input type="password" name="pass"></li>
    <input type="submit" value="登録"> 
</ul>
-->