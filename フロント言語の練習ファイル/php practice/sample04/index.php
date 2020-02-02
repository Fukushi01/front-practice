<?php 

error_reporitng(E_ALL);
ini_set('display_errors', 'On');

if (!empty($_FILES)) {

  $file = $_FILES['image'];

  $msg = '';
  $img_path = '';

  include('upload.php');

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ホームページのタイトル</title>
  <style>
    body {
      margin: 0 auto;
      padding: 150px;
      width: 25%;
      background: #fbfbfa;
    }
 
    h1 {
      color: #545454;
      font-size: 20px;
    }
 
    form {
      overflow: hidden;
    }
 
    input[type="submit"] {
      border: none;
      padding: 15px 30px;
      margin-bottom: 15px;
      background: #3d3938;
      color: white;
      float: right;
    }
 
    input[type="submit"]:hover {
      background: #111;
      cursor: pointer;
    }
 
    .img_area, .img_area img {
      width: 100%;
    }
  </style>
</head>

<body>
  <p><?php if (!empty($msg)) echo $msg; ?></p>

  <h1>画像アップロード</h1>

  <form method= 'POST'  enctype= 'multipart/form-data'>

  <input type='file' name= 'image' value= '<?php if(!empty($_FILE['image'])) echo $file['name']; ?>'>

  <input type= 'submit' value= '送信'>

  </form>

</body>
<html>