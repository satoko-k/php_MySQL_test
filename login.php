


<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>ログイン</title>
  </head>
  <body>
  <div class="wrapper">
    <header>
      <nav>
        <div class="navbar-header">
          <a class="navbar-brand" href="select.php">データ一覧</a>
        </div>
      </nav>
    </header>
      <form method="post" action="login_act.php">
        <div class="jumbotron">
      <!-- fieldsetは<form>タグで定義するフォームの入力項目をグループ化するためのタグ。
      グループ化するとグループ間をtabキーで移動することが可能になる -->
        <fieldset>
          <!-- <legend>タグでグループ化されたフォームにタイトルを付けられる -->
            <legend>ログイン</legend>
            <label for="">ID：<input type="text" name="lid" /></label><br />
            <label for="">パスワード:<input type="text" name="lpw" /></label><br />
          
            <input type="submit" value="ログイン" />
          </fieldset>
        </div>
      </form>
    </main>
   </div>
  </body>
</html>
