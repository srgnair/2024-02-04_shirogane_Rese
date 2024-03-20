
# アプリケーション名
Rese（リーズ）

## 概要
####  飲食店予約サービス
<img width="950" alt="スクリーンショット 2024-03-21 064201" src="https://github.com/srgnair/2024-02-04_shirogane_Rese/assets/143247574/3511038c-b0f9-473a-9d90-a775c0efdf46">

## サービスを作成した背景
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたいため作成しました。

## ~~アプリケーションURL~~
デプロイしていません。

## メイン機能
#### 新規会員登録
- 名前：メールアドレス・パスワードで新規会員登録ができます。
#### ログイン・ログアウト
- メニューからログアウトができます。
#### 認証機能を利用
- メール認証で本人確認されたユーザーのみ機能が使えます。
#### 店舗情報表示機能
- ホームで登録済みの店舗の一覧が確認できます。
- 「詳細を見る」ボタンを押すと、店舗の詳細を確認できます。
#### 店舗検索機能
- エリア・ジャンル・店名で検索できます。
#### お気に入り機能
- ハートボタンを押すことでお気に入り追加・削除ができます。
- マイページでお気に入り一覧を確認できます。
#### 予約機能
- 店舗詳細ページから来店予約ができます。	
- マイページから来店予約の編集・削除ができます。
#### 評価機能
- 予約したお店に来店した後に、店舗を5段階スターとコメントで評価できます。
#### 管理機能
- 管理者としてログインすると、店舗代表者を作成できます。
- 店舗代表者としてログインすると、店舗情報の作成・更新・予約情報の確認・お知らせメールの送信ができます。
#### ~~リマインダー~~
- ~~予約当日の朝に予約情報のリマインダーメールが送信されます。~~
- 機能追加中です。
#### ~~QRコード~~
- ~~照合すると当日の予約情報を確認することができます。~~
- ~~店舗代表者のみ照合が可能です。~~
- 機能追加中です。
#### 決済機能
- stripeを利用して決済をすることができます。

## 使用技術

| カテゴリ       | 技術  |
| :------------- | :------------ |
| フレームワーク | Laravel version:3.8 |
| フロントエンド | blade / CSS |
| バックエンド   | php |
| データベース   | mySQL / phpmyadmin |
| 認証           | Fortify / mailhog |
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
