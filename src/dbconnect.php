<?php

try {
    // データベースに接続
    // dbname：作成したデータベース名と合わせる
    // host:docker-composeのコンテナ名と合わせる。特に変更しないでok
    // user:特に変更しないでok
    // password:docker-compose.ymlのMYSQL_ROOT_PASSWORDと一致させる
    $pdo = new PDO(
        'mysql:dbname=development;host=mysql;charset=utf8mb4',
        'root',
        'mysql',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    //databaseを表示するサンプル
    $stmt = $pdo->query('SHOW DATABASES');
    $stmt -> execute();
    $data = $stmt -> fetchAll();

} catch (PDOException $e) {

    // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());

}

header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Example</title>
    </head>
    <body>
      <!-- 正常な場合次のような結果が表示される -->
      <!-- array(5) { [0]=> array(1) { ["Database"]=> string(18) "information_schema" } [1]=> array(1) { ["Database"]=> string(18) "development_normal" } [2]=> array(1) { ["Database"]=> string(5) "mysql" } [3]=> array(1) { ["Database"]=> string(18) "performance_schema" } [4]=> array(1) { ["Database"]=> string(3) "sys" } } -->
        <?= var_dump($data) ?>
    </body>
</html>
