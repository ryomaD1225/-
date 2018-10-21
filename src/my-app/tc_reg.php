<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>先生登録画面</title>
</head>
<body>
    <form action="tc_reg_act.php" method="post" enctype="multipart/form-data">
        <div>
            <span>名前：</span><input type="text" name="teach_name">
        </div>
        <div>
            <span>パスワード：</span><input type="text" name="teach_pw">
        </div>
        <div>
            <span>写真：</span><input type="file" name="upfile" /><br />
        </div>
        <input type="submit" value="登録">
    </form>
</body>
</html>