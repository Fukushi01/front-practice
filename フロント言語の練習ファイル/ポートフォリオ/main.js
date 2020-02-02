$(function(){
 
    const MSG_TEXT_MAX = '20文字以内で入力してください。';
    const MSG_EMPTY = '入力必須です。';
    const MSG_EMIL_TYPE = 'emailの形式ではありません。';
    const MSG_TEXTAREA_MAX = '100文字以内で入力してください。';

    /*論理構造 
1　まず親要素を取得する。その理由はremoveClass addClassの操作、そしてfind関数は親要素から操作するからである。
2　テキスト内が２０文字以上ならばhelp-blockの箇所をMSG_TEXT_MAXにする。その際にhas-successを外し、has-errorをつける。
　その理由はerror時のCSSを適用するためだ。
3　そうでない場合はhelp-blockの箇所を’’にすることで空白にする。その際にhas-errorを外し、has-successをつける。
  その理由はsuccess時のCSSを適用するためだ。
*/
    $(".valid-text").keyup(function(){

     var parent = $(this).closest(".form-group");

     if($(this).val().length > 20){
       parent.removeClass("has-success").addClass("has-error");
       parent.find(".help-block").text(MSG_TEXT_MAX);
     } else {
       parent.removeClass("has-error").addClass("has-success");
       parent.find("help-block").text("");
     }
    });

    /*論理構造
    １　親要素を取得する
    ２　テキストに何も書かれていない場合はhelp-blockの箇所をEMPTYを記載する
    ３　テキスト内が５０文字以上でありemail形式ではない場合はMSG＿EMAIL＿TYPEを記載する
    ４　それ以外の場合１つ目と同じ方法
    */

    $(".valid-email").keyup(function(){
        var form_g = $(this).closest(".form-group");
    
        if($(this).val().length===0){
            form_g.removeClass("has-success").addClass("has-error");
             form_g.find(".help-block").text(MSG_EMPTY);
} else if($(this).val().length>50||!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/) ){
  form_g.removeClass('has-success').addClass('has-error');
   form_g.find('.help-block').text(MSG_EMIL_TYPE);
} else{
            form_g.removeClass("has-error").addClass("has-success");
            form_g.find(".help-block").text("");
        }

      });

   $('.valid-textarea').keyup(function(){
     var form_g = $(this).closest('.form-group');

     if($(this).val().length===0){
form_g.removeClass('has-success').addClass('has-error');
 form_g.find('.help-block').text(MSG_EMPTY);
     }else if($(this).val().length>100){
       form_g.removeClass('has-success').addClass('has-error');
       form_g.find('.help-block').text(MSG_TEXTAREA_MAX);
     }else{
       removeClass('has-error').addClass('has-success');
       form_g.find('help-block').text('');
     }
   });

  });
