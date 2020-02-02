<?php
if (!empty($_FILES)){

    $upload_path = 'images/'.$file['name'];
    $move_upload = move_uploaded_file($file['tmp_name'], $upload_path);

    if ($move_upload){
        $msg = 'ファイル送信されました。'.$file['name'];
    
    }else {
        $msg ='ファイル送信に失敗しました。'
    }

}else {
    $msg = '画像をアップロードしてください'
}

?>

<!--論理構造
１　ファイル送信されていた場合、ファイルを保存する場所を指定する。
２　ファイルはもともと一時的に[tmp_name]というところに保存されているから、そこから１に保存場所を変えてあげる
３　if文を使いファイル送信されていた場合とそうでなかった場合でバリデーションチェックをしてあげる。
-->
