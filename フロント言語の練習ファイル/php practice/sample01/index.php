<!--php-validation-part-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(!empty($_POST)){
  define('MSG01','入力必須です');
  define('MSG02', 'Emailの形式で入力してください');
  define('MSG03','パスワード（再入力）が合っていません');
  define('MSG04','半角英数字のみご利用いただけます');
  define('MSG05','6文字以上で入力してください');

  $err_msg = array();
  
  if (empty($_POST['email'])){
    $err_msg['email'] = MSG01;
  }

  if (empty($_POST['pass'])){
    $err_msg['pass'] = MSG01;
  }

  if (empty($_POST['pass_retype'])){
    $err_msg['pass_retype'] = MSG01;
  }

  if (!empty($err_msg)){

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_retype = $_POST['pass_retype'];

    if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
    $err_msg['email'] = MSG02;
  }

  if($pass !== $pass_retype){
    $err_msg['pass']= MSG03;
  }

  if(empty($err_msg)){
    
    if(!preg_match("/^[a-zA-Z0-9]+$/", $pass)){
      $err_msg['pass'] = MSG04;
    }

    else if (mb_strlen($pass) >6){
    $err_msg['pass'] = MSG05;
  }

//datebase-part//
if (empty($err_msg)){

  $dsn = 'mysql:dbname=php_sample01;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $options = array(
                // SQL実行失敗時に例外をスロー
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // デフォルトフェッチモードを連想配列形式に設定
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                // バッファードクエリを使う(一度に結果セットをすべて取得し、サーバー負荷を軽減)
                // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            );
 
        // PDOオブジェクト生成（DBへ接続）
        $dbh = new PDO($dsn, $user, $password, $options);
 
        //SQL文（クエリー作成）
        $stmt = $dbh->prepare('INSERT INTO users (email,pass,login_time) VALUES (:email,:pass,:login_time)');
 
        //プレースホルダに値をセットし、SQL文を実行
        $stmt->execute(array(':email' => $email, ':pass' => $pass, ':login_time' => date('Y-m-d H:i:s')));
 
        header("Location:mypage.php"); //マイページへ
}
  }
  }
  }
?>
<!--screen-part-->
<!DOCTYPE html>
<html>
  <head>
    <meta meta charset ="utf-8">
    <title>homepage</title>
    <style>
      body{
        margin: 0 auto;
        padding: 150px;
        width: 25%;
        background: #fbfbfa;
      }

      h1{
        color: #545454;
        font-size: 20px;
      }

      input[type= "text"]{
        color: #545454;
        height: 60px;
        width: 100%;
        padding: 5px 10px;
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
        box-sizing: border-box;
      }

      input[type="password"]{
        color: #545454;
        height: 60px;
        width: 100%;
        padding: 5px 10px;
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
        box-sizing: border-box;
      }

      input[type= 'submit']{
        border: none;
        float: right;
        padding: 15px 30px;
        background: #3b3938;
        color: white;
        margin-bottom: 15px;
      }

      input[type= "submit"]:hover{
        background: #111;
        cursor: pointer;
      }

      .err_msg{
        color: #ff4b4b;
      }

      </style>
  </head>

  <body>
  <h1>ユーザー登録画面</h1>
  <form method= 'post'>

    <span class= "err_msg"><?php if(!empty($err_msg['email'])) echo $err_msg['email'];?></span>
    <input type = "text" name= "email" placeholder= "email" value = "<?php if(!empty($_POST['email'])) echo $_POST['email']?>">

    <span class= "err_msg"><?php if(!empty($err_msg['pass'])) echo $err_msg['pass']; ?></span>
    <input type= "password" name= "pass" placeholder= "password" value= "<?php if(!empty($_POST['pass'])) echo $_POST['pass'];?>">

    <span class= "err_msg"><?php if(!empty($err_msg['pass_retype'])) echo $err_msg['pass_retype']; ?></span>
    <input type= "password" name= "pass_retype" placeholder= "password（再入力)" value="<?php if(!empty($_POST['pass_retype'])) echo $_POST['pass_retype']; ?>">

    <input type= "submit" value= "送信">
</form>

</body>
</head>