<?php
// セッションをスタート
    session_start();

    $lid = $_POST["lid"];
    $lpw = $_POST["lpw"];

// １．ＤＢに接続する

    try {
        $pdo = new PDO('mysql:dbname=camp_testdb; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }

//２ :データ登録のSQL作成　user_tableのu_idとu_pwがマッチいてる人　
    $sql="SELECT * FROM camp_user_table WHERE u_id=:lid AND u_pw=:lpw";
    $stmt = $pdo->prepare($sql);
    $stmt ->bindValue(':lid',$lid);
    $stmt ->bindValue(':lpw',$lpw);
    $res = $stmt->execute();

    // SQI実行時にエラーがある場合
    if($res==false){
        $error = $stmt->errorInfo ();
        exit("QueryError:".$error[2]);
    }

// 3:抽出データ数を取得

    $val = $stmt->fetch(); //レコードを１つだけ取得する方法

    // $count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能

// ４．該当レコードがあればSESSIONに値を代入
    // $valにidが空でなければ
    if( $val["id"] != ""){
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["u_name"] = $val['u_name'];
        $_SESSION["life_flg"] = $val['life_flg'];
        // ログイン処理OKの場合、select.phpへ遷移
        header("Location: select.php");
    }else{
        // ログイン処理NGの場合はlogin.phpへ遷移
        header("Location: login.php");
    }

    ?>
