  /*　論理構造
１　textareaのDOMを取得する
２　打たれた文字の数値を取得する
３　文字数カウントの部分を取得する
４　３を２に反映させる　＝＞innerTextを使うことで可能となる
*/

window.addEventListener('DOMContentLoaded' ,
    function(){

        var node = document.getElementById("comment");

        node.addEventListener("keyup", function(){

            var count = this.value.length;

            var countplace = document.getElementById("count-text");

            countplace.innerText = count;
        } , false);

}, false);

  