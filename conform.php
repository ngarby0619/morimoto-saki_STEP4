<?php

if ($_SERVER['REQUEST_METHOD'] !=='POST') {
    header('Location: form.php');
    exit;
}

$name     =$_POST['name']    ??'';
$age      =$_POST['age']     ??'';
$phone    =$_POST['phone']   ??'';
$email    =$_POST['email']   ??'';
$address  =$_POST['address'] ??'';
$question =$_POST['question']??'';
$gender   =$_POST['gender']  ??'';

$errors =[];

$jpAlphaPattern = '/\A[\p{Hiragana}\p{Katakana}\p{Han}ーa-zA-Z]+\z/u';

if ($name === '' || !preg_match($jpAlphaPattern, $name)){
    $errors[] ='名前はひらがな、カタカナ、漢字、英字のみ使用できます。';
}

if($age === '' || !ctype_digit((string)$age) || (int)$age < 0 || (int)$age > 150) {
    $errors[] ='年齢は0から150の間で入力してください。';
}

if ($phone === '' || !preg_match('/\A[0-9\-]+\z/', $phone)){
    $errors[] ='電話番号は半角英数字とハイフンのみ使用できます。';
}

if ($email ==='' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] ='メールアドレスの形式が正しくありません。';
}

if ($address === '' || !preg_match($jpAlphaPattern, $address)){
    $errors[] ='住所はひらがな、カタカナ、漢字、英字のみ使用できます。';
}

function h($v) {
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>入力内容確認</h1>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?php echo h($e); ?></li>
            <?php endforeach; ?>
        </ul>

        <button type="button" onclick="history.back()">戻る</button>

    <?php else: ?>     
    <p>名前: <?php echo $_POST['name']; ?></p>

    <p>年齢: <?php echo $_POST['age']; ?></p>

    <p>電話番号: <?php echo $_POST['phone']; ?></p>

    <p>メールアドレス: <?php echo $_POST['email']; ?></p>

    <p>住所: <?php echo $_POST['address']; ?></p>

    <p>質問: <?php echo $_POST['question']; ?></p>

    <p>性別: <?php echo $_POST['gender']; ?></p>

    <button type="button" onclick="history.back()">戻る</button>
    <?php endif; ?>

  </div>
</body>
</html>