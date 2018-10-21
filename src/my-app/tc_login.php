<?php
$slug = 'tc_login';
$title = '教師：管理画面へログイン';
include_once 'tmp/header.php';
?>
<div class="text_center">
    <form class="form-signin" action="tc_login_act.php" method="post">
      <div id="unknow_btn_wrap"><span id="unknow_btn">わかんない<br>ボタン</span></div>
      <h1 class="h4 mb-3 font-weight-normal"><?php echo $title;?></h1>
      <label for="inputEmail" class="sr-only">名前：</label>
      <input type="number" id="teach_id" class="form-control" placeholder="教師ID" required autofocus name="teach_id">
      <label for="inputPassword" class="sr-only">パスワード：</label>
      <input type="password" id="teach_pw" class="form-control" placeholder="パスワード" required name="teach_pw">
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">管理画面に移動</button>
    </form>
</div>
<?php include_once 'tmp/footer.php';?>