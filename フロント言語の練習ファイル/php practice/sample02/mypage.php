<?php 

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (empty($_SESSION['login'])) header("Location:login.php");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ホームページのタイトル</title>
    <style>
      body{
        margin: 0 auto;
        padding: 150px;
        width: 25%;
        background: #fbfbfa;
      }
      h1{ color: #545454; font-size: 20px;}
      a{
        color: #545454;
        display: block;
      }
      a:hover{
        text-decoration: none;
      }
    </style>
  </head>

  <body>

      <?php  if(!empty($_SESSION['login'])){ ?>

      <h1>マイページへ</h1>
      <section>
    <p>あなたのemailは？？？です。<br/>
    あなたのパスワードは？？？です。
    </p>
    <a href= 'index.php'>ユーザー登録画面へ</a>
        </section>

      <?php }else { ?>

        <p> ログインしていないと見れません</p>

      <?php } ?>

    </body>
    </html>

<!--html文の中でphpを使ってif文を用いたい場合
条件式の始まりと終わりの部分をPHPで囲む（これは推測だからあとで確かめる）-->