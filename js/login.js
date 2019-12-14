$(function() {

  //入力されたキーを保存する変数定義
  var inputKey = [];

  //入力されたキーと比較する隠しコマンド※ASCII文字
  //65 = A
  //68 = D
  //77 = M
  //73 = I
  //78 = N
  var command = [65,68,77,73,78];
 //画面上のキー入力イベントリスナ
  $(window).keyup(function(e) {

  //キー入力を配列に追加
  inputKey.push(e.keyCode);

   //キー入力が保存された配列と隠しコマンドを比較
  if (inputKey.toString().indexOf(command) >= 0) {

      //隠しコマンド成功時
    if ($('div').hasClass('session')) {
        location.href="../admin/index.php";
    } else {
      $('.login').fadeIn(650);
      $('.bg').css('filter', 'blur(5px)');
    }

      //キー入力を初期化
      inputKey = [];
    }
  });
  $(document).click(function(event) {
    if(!$(event.target).closest('.login').length) {
      $('.login').fadeOut(650);
      $('.bg').css('filter', 'none');
    }
  });
});
