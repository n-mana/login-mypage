<?php
  //ログイン時にアクセスした場合は、マイページにリダイレクトできるようにする。
  session_start();
  if(!empty($_POST['form_mypage'])){
  header("Location:mypage.php");
  }
?>

<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <title>ログイン画面</title>
      <link rel="stylesheet" type="text/css" href="login_error.css">
   </head>

   <body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <form action="mypage.php" method="post">
           <div class="form_contents">
               <div class="error">
                   <p>メールアドレスまたはパスワードが間違っています。</p>
               </div>
               <div class="mail">
                   <label>メールアドレス</label><br>
                      <input type="text" class="formbox" size="40" name="mail" >
               </div>
               <div class="password">
                   <label>パスワード</label><br>
                      <input type="password" class="formbox" size="40" name="password">
               </div>
              
               <div class="loginbutton">
                   <input type="submit" class="submit_button" size="35" value="ログイン">
               </div>
           </div>
        </form>
    </main>

<footer>
© 2018 InterNous.inc. All rightsreserved
</footer>


</body>

</html>