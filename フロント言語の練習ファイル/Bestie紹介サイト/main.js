$(function(){
    const MSG_TEXT= "２０文字以下で入力してください";
    const MSG_EMAIL= "email形式で入力してください";
    const MSG_TEXTAREA_MAX= "１００文字以下で入力してください";
    const MSG_EMPTY= "入力必須です";

    /*word written in valid-text is more than 20 */
    $(".valid-text").keyup(function(){

        var form_g = $(this).closest(".form-group");

        if($(this).val().length > 20){
            form_g.removeClass("has-success").addClass("has-error");
            form_g.find(".help-block").text(MSG_TEXT);
        } 
        else {
            form_g.removeClass("has-error").addClass("has-success");
            form_g.find(".help-block").text("");
        }
    });

     /*type-pattern is not email */
    $(".valid-email").keyup(function(){

        var form_g = $(this).closest(".form-group");

        if($(this).val().length == 0){
            form_g.removeClass("has-success").addClass ("has-error");
            form_g.find(".help-block").text(MSG_EMPTY);
        } 
        else if($(this).val().length > 50 ||!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
            form_g.removeClass("has-success").addClass ("has-error");
            form_g.find(".help-block").text(MSG_EMAIL);
        } 
        else {
            form_g.removeClass("has-error").addClass("has-success");
            form_g.find(".help-block").text("");
        }
    });

    /*textarea_max */
    $(".valid-textarea").keyup(function(){

        var form_g = $(this).closest(".form-group");

        if($(this).val().length == 0){
            form_g.removeClass("has-success").addClass("has-error");
            form_g.find(".help-block").text(MSG_EMPTY);
        }
         else if ($(this).val().length > 100){
             form_g.removeClass("has-success").addClass("has-error");
             form_g.find(".help-block").text(MSG_TEXTAREA_MAX);
         }
            else {
                form_g.removeClass("has-error").addClass("has-success");
                form_g.find(".help-block").text("");
            }
        });
    });