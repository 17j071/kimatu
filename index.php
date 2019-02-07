<?php
    session_start();
    $mail = "";
?>
<h1>ログイン</h1>
<p>
    <?php
        if (isset($_SESSION["errorMessage"])) {
            echo $_SESSION["errorMessage"];
            $mail = $_SESSION["mail"];
        }
        if (isset($_SESSION["name"])) {
            header('Location: ./toppage.php');
            exit;
        }
        
        
    ?>
</p>

<form action="login.php" method="post">
メールアドレス<input type="text" name="mail" value="<?php echo $mail ?>"><br>
パスワード<input type="password" name="pass"><br>
<input type="submit" value="ログイン"> 
</form>
<a href="toroku.php">会員登録</a>
