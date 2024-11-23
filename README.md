# instagrm demo
***
### 機能
ログイン情報を入力すると、**MySQLデータベース**に保存されます。
***
### 必要な準備 
**MySQLデータベース**: MySQLデータベースにテーブルを作成する必要があります。以下のSQLコマンドを使用して、`users`テーブルを作成しときます。

`CREATE DATABASE instagram_login;USE instagram_login;CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY,email VARCHAR(255) NOT NULL,password VARCHAR(255) NOT NULL);`

