/*　　論理構造
1 フォームの値を取得する
2　ハイフンが入力されていた場合にまずハイフンを削除する
3　全角英数字を半角英数字に変換する
4　入力が１１文字だった場合、３文字目、７文字目、１１文字目のハイフンを挿入する
5　そうでない場合は１から３の条件を満たした状態でフォームを変換する
*/

$(function(){

    $("format-number").keyup(function(){

        var number = $(this).val();
        
        var non_number = number.replace("-","");

        var modified_format= non_number.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){ return String.fromCharCode(s.charCodeAt(0)-0xFEE0) });

        if ($(this).val().length ==11){

            $(this).val(modified_format.substr(0,3)+"-"+modified_format.substr(3,4)+"-"+modified_format.substr(7,4));

        } else {
            $(this).val(modified_format);
        }


    });
});


















