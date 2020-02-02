<?php 

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(!empty($_POST)){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $dsn = 'mysql:dbname= php_sample01; host=localhost; charset= utf-8';
    $user = 'root';
    $password = 'pass';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
    );

    $dbh = new PDO ($dsn, $user, $password, $options);

    $statement = $dbh ->prepare('SELECT * FROM users WHERE email = :enail AND pass = :pass');

    $statement ->execute(array(':email' => $email, ':pass' => $pass));

    $result = 0;

    $result = $statement ->fetch(PDO::FETCH_ASSOC);

    if (!empty($result)) {

        session_start();

        $_SESSION['login'] = true;

        header("Location:mypage.php");
    }
}

?>

<!DOCTYPE HTML>
<html lang= 'ja'>
    <head>
        <meta charset='utf-8'>
        <title>sample</title>
        <style>
        body{
        margin: 0 auto;
        padding: 150px;
        width: 25%;
        background: #fbfbfa;
      }
      h1{ color: #545454; font-size: 20px;}
      form{
        overflow: hidden;
      }
      input[type="text"]{
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
      input[type="submit"]{
        border: none;
        padding: 15px 30px;
        margin-bottom: 15px;
        background: #3d3938;
        color: white;
        float: right;
      }
      input[type="submit"]:hover{
        background: #111;
        cursor: pointer;
      }
      a{
        color: #545454;
        display: block;
      }
      a:hover{
        text-decoration: none;
      }
      .err_msg{
        color: #ff4d4b;
      }
  </style>
  </head>
  <body>
      <h1>ログイン</h1>
      <form method = 'post'>

    <input type= "text" name= "email" placeholder= "email" value= "<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">

    <input type= "password" name= "pass" placeholder= "password" value= "<?php if(!empty($_POST['pass'])) echo $_POST['pass']; ?>">

    <input type= "submit" value= "送信">

    </form>

    </body>
 </html>