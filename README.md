# アプリケーション名
Rese（リーズ）

## 概要
####  飲食店予約サービス
<img width="950" alt="スクリーンショット 2024-03-21 064201" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/3511038c-b0f9-473a-9d90-a775c0efdf46">

## サービスを作成した背景
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## ~~アプリケーションURL~~

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
#### 評価機能
- 予約したお店に来店した後に、利用者が店舗を5段階評価とコメントができます。
#### 管理画面
- 管理者と店舗代表者と利用者の3つの権限からユーザーを作成できます。
- 店舗代表者が店舗情報の作成、更新と予約情報の確認ができます。 
- 管理者側は店舗代表者を作成できます。
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
  
## 使用技術

| カテゴリ       | 技術  |
| :------------- | :------------ |
| フレームワーク | Laravel Framework version:11.4.0 |
| フロントエンド | blade / CSS |
| バックエンド   | php:8.3.3 | nginx:1.25.4
| データベース   | mySQL:8.0.36 / phpMyAdmin:5.2.1 | mailhog:latest
| 認証           | Fortify |
| サーバー       | nginx:1.21.1 |

## テーブル設計
####  <img width="540" alt="スクリーンショット 2024-06-03 131314" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/d8dd0d97-cdb9-42e2-a67f-8a16a716b2c5">
####  <img width="540" alt="スクリーンショット 2024-06-03 131354" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/adac0432-4870-4fa2-ac74-e91703f67f35">
####  <img width="540" alt="スクリーンショット 2024-06-03 131435" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/788a57e0-a46f-4bc5-a6cc-2b78ee9a1a77">
####  <img width="540" alt="スクリーンショット 2024-06-03 131451" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/c7fa44ec-b779-499d-8886-8299dc294766">
####  <img width="540" alt="スクリーンショット 2024-06-03 131505" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/f3041899-cd5c-4855-86dd-5dc52476f11c">
####  <img width="540" alt="スクリーンショット 2024-06-03 131521" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/a3b0caf8-d848-44e0-bec7-54f40b11c487">

## ER図
####  <img width="540" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/8b447129-b518-4080-b149-c8aa33489efa">

## 環境構築

#### ディレクトリ構成
atte  
├── docker  
│&emsp;&emsp;├── mysql  
│&emsp;&emsp;│&emsp;&emsp;├── data  
│&emsp;&emsp;│&emsp;&emsp;└── my.cnf  
│&emsp;&emsp;├── nginx  
│&emsp;&emsp;│&emsp;&emsp;└── default.conf  
│&emsp;&emsp;└── php  
│&emsp;&emsp;&emsp;&emsp;&emsp;├── Dockerfile  
│&emsp;&emsp;&emsp;&emsp;&emsp;└── php.ini  
├── docker-compose.yml  
└── src  

#### パッケージのインストール
$ composer -v

#### プロジェクトの作成
$ composer create-project "laravel/laravel=8.*" . --prefer-dist

下記のローカル環境にアクセス
http://localhost/

## ほかに記載すること
全ての機能は完成できませんでした。

