<?php
mb_internal_encoding("utf8");
session_start();

try{
//DB接続
$pdo=new PDO("mysql:dbname=lesson1;host=localhost;","root","");
}catch(PDOException $e){
　　　die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
　　　<a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
}

//prepared statement（プリペアードステートメント）でSQL文の型を作る
$stmt=$pdo->prepare("update login_mypage set name=?,mail=?,password=?,comments=? where id=?");

//bindValueメソッドでパラメータをセット
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);

//executeでクエリを実行。
$stmt->execute();

//プリペアードステートメント（行進）された情報をDBからselect文で取得）でSQLをセット
$stmt=$pdo->prepare("select * from login_mypage where mail = ? && password = ?");

//bindValueメソッドでパラメータをセット
$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

//executeでクエリを実行。
$stmt->execute();

//DBを切断
$pdo=NULL;

//fetch・while文でデータ取得し、sessionに代入
while($row=$stmt->fetch()){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

//mypafe.phpへリダイレクト
header('Location:http://localhost/login_mypage/mypage.php');

?>