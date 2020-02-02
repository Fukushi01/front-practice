<?php 

if ( !empty($to) && !empty($subject) && !empty($comment)){

    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $from = 'info@webukatu.com';

    $result = mb_send_mail($to, $subject, $comment, "From: ". $from);

    if($result) {
        unset ($_POST);
        $msg = 'メールが送信されました';
    } else {
        $msg = 'メールの送信に失敗しました';
    }

}else {
    $msg= '全て入力必須です';
}

?>


