<?php 
    session_start();
    $name = "";
    $mail = "";
    if(isset($_SESSION['nameError'])) { 
        echo $_SESSION['nameError']; 
        $_SESSION['nameError'] = "";
    }
    if(isset($_SESSION['mailError'])) { 
        echo $_SESSION['mailError']; 
        $_SESSION['mailError'] = "";
        
    }
    if(isset($_SESSION['passError'])) { 
        echo $_SESSION['passError'];
        $_SESSION['passError'] = ""; 
    }
    
?>
<!DOCTYPE html>
<head>
    <title>会員登録</title>
</head>
<body>
<h1>会員登録</h1> 
<form action="toroku_check.php" method="post">
ニックネーム<input type="text" name="name" value=""><br>
メールアドレス<input type="text" name="mail" value=""><br>
パスワード<input type="password" name="pass"><br>
<input type="submit" value="登録"> 
</form>
<a href="index.php">戻る</a>
</body>

<!-- 後で揃える
<ul>
    <li>名前<input type="text" name="name"></li>
    <li>Email<input type="text" name="mail"></li>
    <li>パスワード<input type="password" name="pass"></li>
    <input type="submit" value="登録"> 
</ul>
-->