# アプリケーション名
Rese（リーズ）

## 概要
####  飲食店予約サービス
<img width="950" alt="スクリーンショット 2024-03-21 064201" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/3511038c-b0f9-473a-9d90-a775c0efdf46">

## サービスを作成した背景
- 自社用予約サービスの作成。
- COACHTECH 様（ https://coachtech.site/ ）への提出課題です。

## メイン機能
#### 新規会員登録
- メールアドレス・パスワードで新規会員登録ができます。
#### ログイン・ログアウト機能
- 会員情報をつかってログイン・ログアウトができます。
#### ユーザ情報表示機能
- 登録済みのユーザー情報を確認できます。
#### お気に入り機能
- ハートマークからお気に入り追加・削除ができます。
#### 飲食店一覧・詳細取得機能
- 登録された飲食店一覧を表示します。
- 飲食店一覧から選択された店舗の詳細情報を表示します。
#### 飲食店予約機能追加：変更・削除機能
- 詳細ページから飲食店の予約ができます。
- 予約の変更・削除もできます。
#### 検索機能
- 飲食店一覧をエリア・ジャンル・店名で検索できます。
#### 店舗一覧ソート
- 一般ユーザーは店舗一覧を並び替えることができます。
- ランダム、評価が高い順、評価が低い順
#### 口コミ機能
- 一般ユーザーは店舗に対し口コミを追加することができます。
- 口コミは「テキスト・星(1~5)・画像」で構成されています。
- 一般ユーザーは1店舗に対し2件以上の口コミを追加することはできません。
- 一般ユーザーは自身が追加した口コミの内容を編集・削除することができます。
- 編集画面で前回の口コミの入力値を保持することができます。
- 管理ユーザーは全ての口コミを削除することができます。
#### 管理画面
- 管理者と店舗代表者と利用者の3つの権限からユーザーを作成できます。
- 店舗代表者が店舗情報の作成、更新と予約情報の確認ができます。 
- 管理者側は店舗代表者を作成できます。
- 管理ユーザーはcsvをインポートすることで、店舗情報を追加することができます。
#### ストレージ
- お店の画像をストレージに保存することができる
#### 認証
- メールによって本人確認を行うことができる
#### 商品検索機能
- キーワード検索、カテゴリー・商品の状態・値段の絞込検索ができます。
#### リマインダー
- 予約当日の朝に予約情報のリマインダーを送れます。
#### 決済機能
- Stripeを利用して決済をすることができます。

## csvファイルの記述方法

- ファイル形式：CSV UTF-8(コンマ区切り)(*.csv)
- エクセルでこのようなファイルを作成してください。
- ![スクリーンショット 2024-06-24 205403](https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/4e538690-8953-49eb-b216-7c57888450d9)
- 左から店舗名、エリア、ジャンル、店舗概要、画像です。
- エリア：東京都は1　大阪府は2　福岡県は3 と半角数字で入力してください。
- ジャンル：イタリアンは1 ラーメンは2 居酒屋は3 寿司は4 焼肉は5 と半角数字で入力してください。
- ※画像のアップロードは現在できない状態です。
  
## 使用技術

| カテゴリ       | 技術  |
| :------------- | :------------ |
| フレームワーク | Laravel Framework 8.83.27 |
| フロントエンド | blade / CSS |
| バックエンド   | php 7.4.9 | 
| データベース   | mySQL:8.0.36 / phpMyAdmin:5.2.1 | mailhog:latest
| 認証           | Fortify |
| サーバー       | nginx:1.21.1 |

## 環境構築

## **Laravel + Docker Compose プロジェクトのクローンから起動まで**

### **前提**

Git、Docker、Docker Composeがインストールされている

### **GitHubからクローンする**

```

git clone https://github.com/srgnair/2024-02-04_shirogane_Rese.git
cd 2024-02-04_shirogane_Rese

```

### **.envファイルを準備する**

```

cp .env.example .env

```

必要に応じて .env の内容（DB接続情報など）を修正します。

修正例：

```

DB_HOST=mysql

DB_DATABASE=laravel_db

DB_USERNAME=laravel_user

DB_PASSWORD=laravel_pass

APP_URL=http://localhost

```

### **補足１：Apple Silicon（M1/M2）での注意点**

Apple Siliconを使用している場合、docker-compose.yml に以下を追記：

```

platform: linux/amd64

```

nginx, mysql, mailhog, phpmyadmin など各サービスに必要です。

### 補足２：NotFound: content digest sha256:... not foundが出る場合

タグの変更例：

```

image: mysql:8.0

image: nginx:1.21-alpine

```

### **コンテナをビルドして起動**

```

docker-compose up -d --build

```

### **Laravelの依存パッケージをインストール**

```

docker compose exec php bash
composer install

```

### **アプリキーの生成**

```

docker-compose exec php bash

php artisan key:generate

```

### **マイグレーション（必要に応じて）**

```

docker-compose exec php bash

php artisan migrate

```

### **ブラウザで確認**

通常は http://localhost でアクセスできます。

ポートを変更している場合は docker-compose.yml の ports: の設定を確認してください。

## テーブル設計
####  <img width="540" alt="スクリーンショット 2024-06-03 131314" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/0d2af200-be1d-4137-95da-ad6888578934">

####  <img width="540" alt="スクリーンショット 2024-06-23 153828" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/07f870bf-1a8e-4795-b466-e8ad08aaa322">

####  <img width="540" alt="スクリーンショット 2024-06-23 153840" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/17480c2c-198f-450c-b791-7c7223d0dd98">
####  <img width="540" alt="スクリーンショット 2024-06-23 153854" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/96f90b4a-b7c3-4c83-ad6f-677ced5c1ddb">

## ER図
####  <img width="540" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/af73b8b4-8052-466a-ad8c-e818b92e570b">


