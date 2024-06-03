# アプリケーション名
coachtechフリマ

## 概要
####  独自のフリマアプリ
<img width="950" alt="スクリーンショット 2024-03-21 064201" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/3511038c-b0f9-473a-9d90-a775c0efdf46">

## サービスを作成した背景
coachtechブランドのアイテムを出品するために作成しました。

## ~~アプリケーションURL~~
デプロイしていません。

## メイン機能
#### 新規会員登録
- メールアドレス・パスワードで新規会員登録ができます。
#### ログイン・ログアウト機能
- 会員情報をつかってログイン・ログアウトができます。
- Googleアカウント（外部API）
#### 商品一覧・詳細取得機能
- 出品された商品一覧を表示します。
- 商品一覧から選択された商品の詳細情報を表示します。
#### 目的別商品一覧取得機能
- お気に入りに登録した商品一覧を表示します。
- 購入した商品一覧を表示します。
- 出品した商品一覧を表示します。
#### ユーザ情報表示・変更機能
- 登録済みのユーザー情報を確認できます。
- 同じページから編集もできます。
#### お気に入り機能
- 商品詳細ページのハートマークからお気に入り追加・削除ができます。
- 非同期処理でページリロードなしで読みこみます。
#### コメント機能
- 商品詳細ページから商品へのコメントを投稿できます。
- 削除機能もあります。
#### 出品 
- 商品を出品できます。
#### 購入
- 商品を購入できます。
- クレジットカード・銀行振込が選択できます。
#### 配送先設定
- 登録住所以外に配送先を設定できます。
#### 管理画面
- 管理者と利用者の２つの権限があります。
- 管理者は管理者の作成、商品一覧の確認。出品者への送金額の確認ができます。
- 利用者にメールを送信することができます。
#### 商品検索機能
- キーワード検索、カテゴリー・商品の状態・値段の絞込検索ができます。
#### 発送登録・到着登録
- 発送登録と到着登録ができます。
#### 出品者の評価・閲覧
- 取引終了後にお互いの評価ができます。
  
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
####  <img width="540" alt="スクリーンショット 2024-03-21 064822" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/10f2764a-7c07-4dc2-a9ec-71566c1ce301">
  
####  <img width="540" alt="スクリーンショット 2024-03-21 064851" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/b6250f58-618a-4594-b52b-f32e38743364">
  
####  <img width="540" alt="スクリーンショット 2024-03-21 064924" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/af37892e-3c5b-4893-9ed9-b5e65511d287">

####  <img width="540" alt="スクリーンショット 2024-03-21 064931" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/feb7485f-0c5c-431a-b2bb-ed81f55df677">

####  <img width="540" alt="スクリーンショット 2024-03-21 064946" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/525cadfb-5cd1-48dd-8039-72c5acdb9bf3">
  
## ER図
####  <img width="540" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/59c8810c-7d7e-4ba7-a68b-a315706ac4ac">

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

