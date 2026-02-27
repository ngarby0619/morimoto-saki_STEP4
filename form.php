<!DOCTYPE html>
<html lang="ja>
<head>
    <meta charset="UTF-8">
    <title>フォーム入力</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>フォーム入力</h1>

    <form action="conform.php" method="post">

        <div class="form-group">
            <label for="name">名前：</label>
            <input type="text" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="age">年齢：</label>
            <input type="number" id="age" name="age">
        </div>

        <div class="form-group">
            <label for="phone">電話番号：</label>
            <input type="text" id="phone" name="phone">
        </div>

        <div class="form-group">
            <label for="email">メールアドレス：</label>
            <input type="email" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="address">住所：</label>
            <input type="text" id="address" name="address">
        </div>

        <div class="form-group">
            <label for="question">質問：</label>
            <textarea id="question" name="question"></textarea>
        </div>

        <div class="form-group">
            <label for="gender">性別：</label>
            <select id="gender" name="gender">
                <option value="">選択してください</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
            </select>
        </div>

        <button type="submit">送信</button>
    </form>
</div>

</body>
</html>