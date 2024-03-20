<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('shops')->insert([
            [
                'shop_name' => '仙人',
                'image' => 'img/sushi.jpg',
                'area' => '1',
                'genre' => '4',
                'introduction' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
                'shop_admin_id' => '3'
            ],
            [
                'shop_name' => '牛助',
                'image' => 'img/yakiniku.jpg',
                'area' => '2',
                'genre' => '5',
                'introduction' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '戦慄',
                'image' => 'img/izakaya.jpg',
                'area' => '3',
                'genre' => '3',
                'introduction' => '気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => 'ルーク',
                'image' => 'img/italian.jpg',
                'area' => '1',
                'genre' => '1',
                'introduction' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '志摩屋',
                'image' => 'img/ramen.jpg',
                'area' => '3',
                'genre' => '2',
                'introduction' => 'ラーメン屋とは思えない店内にはカウンター席はもちろん、個室も用意してあります。ラーメンはこってり系・あっさり系ともに揃っています。その他豊富な一品料理やアルコールも用意しており、居酒屋としても利用できます。ぜひご来店をお待ちしております。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '香',
                'image' => 'img/yakiniku.jpg',
                'area' => '1',
                'genre' => '5',
                'introduction' => '大小さまざまなお部屋をご用意してます。デートや接待、記念日や誕生日など特別な日にご利用ください。皆様のご来店をお待ちしております。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => 'JJ',
                'image' => 'img/italian.jpg',
                'area' => '2',
                'genre' => '1',
                'introduction' => 'イタリア製ピザ窯芳ばしく焼き上げた極薄のミラノピッツァや厳選されたワインをお楽しみいただけます。女子会や男子会、記念日やお誕生日会にもオススメです。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => 'らーめん極み',
                'image' => 'img/ramen.jpg',
                'area' => '1',
                'genre' => '2',
                'introduction' => '一杯、一杯心を込めて職人が作っております。味付けは少し濃いめです。 食べやすく最後の一滴まで美味しく飲めると好評です。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '鳥雨',
                'image' => 'img/izakaya.jpg',
                'area' => '2',
                'genre' => '3',
                'introduction' => '素材の旨味を存分に引き出す為に、塩焼を中心としたお店です。比内地鶏を中心に、厳選素材を職人が備長炭で豪快に焼き上げます。清潔な内装に包まれた大人の隠れ家で贅沢で優雅な時間をお過ごし下さい。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '築地色合',
                'image' => 'img/sushi.jpg',
                'area' => '1',
                'genre' => '4',
                'introduction' => '鮨好きの方の為の鮨屋として、迫力ある大きさの握りを1貫ずつ提供致します。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '晴海',
                'image' => 'img/yakiniku.jpg',
                'area' => '2',
                'genre' => '5',
                'introduction' => '毎年チャンピオン牛を買い付け、仙台市長から表彰されるほどの上質な仕入れをする精肉店オーナーの本当に美味しい国産牛を食べてもらいたいという思いから誕生したお店です。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '三子',
                'image' => 'img/yakiniku.jpg',
                'area' => '3',
                'genre' => '5',
                'introduction' => '最高級の美味しいお肉で日々の疲れを軽減していただければと贅沢にサーロインを盛り込んだ御膳をご用意しております。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '八戒',
                'image' => 'img/izakaya.jpg',
                'area' => '1',
                'genre' => '3',
                'introduction' => '当店自慢の鍋や焼き鳥などお好きなだけ堪能できる食べ放題プランをご用意しております。飲み放題は2時間と3時間がございます。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '福助',
                'image' => 'img/sushi.jpg',
                'area' => '2',
                'genre' => '4',
                'introduction' => 'ミシュラン掲載店で磨いた、寿司職人の旨さへのこだわりはもちろん、 食事をゆっくりと楽しんでいただける空間作りも意識し続けております。 接待や大切なお食事にはぜひご利用ください。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => 'ラー北',
                'image' => 'img/ramen.jpg',
                'area' => '1',
                'genre' => '2',
                'introduction' => 'お昼にはランチを求められるサラリーマン、夕方から夜にかけては、学生や会社帰りのサラリーマン、小上がり席もありファミリー層にも大人気です。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '翔',
                'image' => 'img/izakaya.jpg',
                'area' => '2',
                'genre' => '3',
                'introduction' => '博多出身の店主自ら厳選した新鮮な旬の素材を使ったコース料理をご提供します。一人一人のお客様に目が届くようにしております。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '経緯',
                'image' => 'img/sushi.jpg',
                'area' => '1',
                'genre' => '4',
                'introduction' => '職人が一つ一つ心を込めて丁寧に仕上げた、江戸前鮨ならではの味をお楽しみ頂けます。鮨に合った希少なお酒も数多くご用意しております。他にはない海鮮太巻き、当店自慢の蒸し鮑、是非ご賞味下さい。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '漆',
                'image' => 'img/yakiniku.jpg',
                'area' => '1',
                'genre' => '5',
                'introduction' => '店内に一歩足を踏み入れると、肉の焼ける音と芳香が猛烈に食欲を掻き立ててくる。そんな漆で味わえるのは至極の焼き肉です。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => 'THE TOOL',
                'image' => 'img/italian.jpg',
                'area' => '3',
                'genre' => '1',
                'introduction' => '非日常的な空間で日頃の疲れを癒し、ゆったりとした上質な時間を過ごせる大人の為のレストラン&バーです。',
                'shop_admin_id' => null
            ],
            [
                'shop_name' => '木船',
                'image' => 'img/sushi.jpg',
                'area' => '2',
                'genre' => '4',
                'introduction' => '毎日店主自ら市場等に出向き、厳選した魚介類が、お鮨をはじめとした繊細な料理に仕立てられます。また、選りすぐりの種類豊富なドリンクもご用意しております。',
                'shop_admin_id' => null
            ],
        ]);
    }
}
