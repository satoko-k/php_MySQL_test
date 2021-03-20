<?php
////////////////////////
//セッションの確認
////////////////////
 session_start();

 include("function.php");
 loginCheck();
//  if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){
//     echo "LOGIN Error!";
//     exit();
//  }else{
//     //  認証できてる時　セッションリジェネレイト
//     session_regenerate_id(true);
//     $_SESSION["chk_ssid"] = session_id();
//     // echo $_SESSION["chk_ssid"];
//  }
echo $_SESSION["chk_ssid"];


// 1:DBに接続する（エラー処理の追加）関数化させた後
$pdo = db_connect();

//2：データ登録のSQL作成[選択]

    $stmt = $pdo->prepare("SELECT * FROM camp_user_table");

    // SQLの実行
    $status = $stmt->execute();



// 3.データの表示
$view = "";
if($status==false){
    //execute (SQL実行時にErrorがある場合）
    $error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]);   //"ErrorQuery:"を日本語にしてもＯＫ「sqlエラーです」
} else {
    //Selectデータの数だけ自動でループして$resultに入れてくれる
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= "<p>".$result["id"]."-".$result["u_name"]."</p>";    //「.=」で追加　「=」だと上書きしてしまう
        // $view .='<p>';
        // $view .=$result["indate"].":".$result["name"];
        // $view .='</p>';

    }
}
    // ＄viewを表示したいところでechoする。



?>



<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>データの抽出表示</title>
  </head>
  <body>
  <div class="wrapper">
    <header>
      <nav>
        <div class="navbar-header">
          <a class="navbar-brand" href="select.php">データ一覧</a>
          <a class="navbar-brand" href="logout.php">ログアウト</a>
        </div>
      </nav>
    </header>
  <main>
      <div class="container"><?=$view?></div>
      <!-- echo〜　の省略 --> 

    </main>
   </div>
  </body>
</html>
