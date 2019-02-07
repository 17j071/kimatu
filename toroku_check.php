<?php
    session_start();
    $name = $_POST['name']; 
    $mail = $_POST['mail']; 
    $pass = $_POST['pass']; 
    htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');
    
    $errorFlag = false;
    if($name == ""){
        $errorFlag = true;
        $_SESSION['nameError'] = "名前を入力してください<br>";
    }
    if($mail == ""){
        $errorFlag = true;
        $_SESSION['mailError'] = "メールアドレスを入力してください<br>";
    }
    if($pass == ""){
        $errorFlag = true;
        $_SESSION['passError'] = "パスワードを入力してください<br>";
    }
    if(strlen ($pass)<4){
        $errorFlag = true;
        $_SESSION['passError'] = "パスワードは4文字以上入力してください<br>";
    }
    if($errorFlag){
        header( "Location: ./toroku.php" );
    	exit;
    }
?>
<?php 
    echo "名前：".$name."<br>";
    echo "メールアドレス：".$mail."<br>";
    echo "この内容で登録していいですか？"
?>
<form action="member_add.php" method="post">
<input type="hidden" name="name" value="<?php echo $name ?>"><br>
<input type="hidden" name="mail" value="<?php echo $mail ?>"><br>
<input type="hidden" name="pass" value="<?php echo $pass ?>"><br>
<input type="submit" value="OK"> 
<form action="toroku.php" method="post">
<input type="submit" value="キャンセル"> 