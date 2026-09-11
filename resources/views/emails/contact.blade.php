<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>お問い合わせ内容</h2>

    <p><strong>名前：</strong>{{ $data['name'] }}</p>
    <p><strong>メールアドレス：</strong>{{ $data['email'] }}</p>
    <p><strong>お問い合わせ内容：</strong></p>
    <p>{{ $data['body'] }}</p>
</body>
</html>