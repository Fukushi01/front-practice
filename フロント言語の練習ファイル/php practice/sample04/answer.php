<?php
 
error_reporting(E_ALL); //全てのエラーを報告する
ini_set('display_errors', 'On'); //画面にエラーを表示させるか
 
// 1.ファイルが送信されていた場合
if (!empty($_FILES)) {
 
// A.フォームから送られたファイルを受信
  $file = $_FILES['image'];
 
// B.メッセージ表示用と画像表示用の変数を用意
  $msg = '';
  $img_path = '';
 
// C.画像アップロードプログラム（外部のphpファイル）を読み込む
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
 
<form method="post" enctype="multipart/form-data">
 
  <input type="file" name="image">
 
  <input type="submit" value="アップロード">
 
</form>
 
<?php if (!empty($img_path)) { ?>
  <div class="img_area">
    <p>アップロードした画像</p>
    <img src="<?php echo $img_path; ?>">
  </div>
<?php } ?>
 
</body>
</html></pre>
<pre class="">

<?php
 
// 画像アップロードプログラム
//==============================
 
// 1.ファイルが送られてきている場合
if(!empty($file)){
 
    //本来は下記のようなバリデーションを行うが、今回は省略
    // バリデーション内容
    //  1.送られてきたファイルは画像ファイルか？（拡張子がjpeg、pngかどうかなどで判定）
    //  2.ファイルサイズは上限内か？（やみくもにバカでかいファイルを送って来らると困るので、ファイルサイズ上限内か判定）
 
    // A.サーバに画像を保存する
    $upload_path = 'images/'.$file['name']; // images/HNCK5278-1300x867.jpg
    $rst = move_uploaded_file($file['tmp_name'],$upload_path); //移動元のファイルパスと移動先のファイルパスを指定

 
    // B.アップロード結果によって表示するメッセージを変数へ入れる
    if ($rst){
        $msg = '画像をアップしました。アップした画像ファイル名：'.$file['name'];
        $img_path = $upload_path; //表示用画像パスの変数へ画像パスを入れる
    }else{
        $msg = '画像はアップ出来ませんでした。エラー内容：'.$file['error'];
    }
 
}else{
 
  $msg = '画像を選択してください';
}
 
?>