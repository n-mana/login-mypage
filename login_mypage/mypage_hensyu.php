<?php
mb_internal_encoding("utf8");
session_start();

//  mypage.phpからの導線以外は、「login_error.php」へリダイレクト
if(empty($_POST['from_mypage'])){
    header("Location:login_error.php");
    }
?>


<!DOCTYPE html>
<html lang="ja">
   <head>
      <meta charset="UTF-8">
      <title>マイページ登録</title>
      <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
   </head>

   <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログアウト</a></div>
    </header>

      <body>

      <form action="mypage_update.php" method="post">
          <div class="form">
          <h2>会員情報</h2>
               <p>　こんにちは！<?php echo $_SESSION['name'];?>さん</p>
           <div class="profile_pic">
               <img src="<?php echo $_SESSION['picture']; ?>">
           </div>

           <div class="basic_info">
               <p>氏名：<input type="text" size="30" value="<?php echo $_SESSION['name'];?>" name="name" >
               </p>

               <p>メール：<input type="text" size="30" value="<?php echo $_SESSION['mail'];?>" name="mail" >
               </p>

               <p>パスワード：<input type="text" size="30" value="<?php echo $_SESSION['password'];?>" name="password" >
               </p>
               <input type="hidden" value="?php echo rand(1,10);?>"name="form_mypage_hensyu">

                 <div class="commentarea">
                  <p><textarea rows="3" cols="70" name="comments"><?php echo $_SESSION['comments'];?></textarea>
                  </p>
                 </div>
                 
                 <div class="button">
                     <form action="mypage_update.php" method="post">
                     <input type="submit" class="hensyu_button" value="この内容に変更する"/>
                 </div>     
            </div>
           </div>
       </form>

        <footer>
          © 2018 InterNous.inc. All rightsreserved
        </footer>

      </body>
</html>