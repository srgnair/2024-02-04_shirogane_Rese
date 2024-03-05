<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;

class AdminController extends Controller
{
    public function addNewShopView()
    {
        return view('addNewShop');
    }

    public function addNewShop(Request $request)
    {
        $shop_admin_id = Auth::id();

        $newShop = $request->all();
        $newShop['shop_admin_id'] = $shop_admin_id;

        // フォームから送信された画像を取得
        $img = $request->file('image');

        // ファイル名をランダムに生成
        $filename = uniqid() . '.' . $img->getClientOriginalExtension();

        // 画像をpublic/storage/imgに保存
        $img->storeAs('public/img', $filename);

        // 保存されたファイルのパスをデータに追加
        $newShop['image'] = 'storage/img/' . $filename;

        Shop::create($newShop);

        return redirect()->route('shopAdminView');
    }

    public function editShopView()
    {
        // ログイン中のユーザーのIDを取得
        $user_id = Auth::id();

        // ログイン中のユーザーのshop_admin_id と一致する店舗情報を取得
        $shops = Shop::where('shop_admin_id', $user_id)->get();

        // ビューにデータを渡す
        return view('editShop', compact('shops'));
    }

    public function editShop(Request $request)
    {
        $shop_admin_id = Auth::id();
        $shop_id = $request->input('shop_id');

        // フォームデータから不要な_tokenキーを削除
        $shopData = $request->except('_token');
        $shopData['shop_admin_id'] = $shop_admin_id;

        // フォームから送信された画像を取得
        $img = $request->file('image');

        // ファイル名をランダムに生成
        $filename = uniqid() . '.' . $img->getClientOriginalExtension();

        // 画像をpublic/storage/imgに保存
        $img->storeAs('public/img', $filename);

        // 保存されたファイルのパスをデータに追加
        $shopData['image'] = 'storage/img/' . $filename;

        // $idを使用して対象の店舗を取得
        $shop = Shop::findOrFail($shop_id);

        // 取得した店舗情報を更新する
        $shop->update($shopData);

        // リダイレクト
        return redirect()->route('shopAdminView');
    }

    // public function editShop(Request $request)
    // {
    //     $shop_admin_id = Auth::id();
    //     $shop_id = $request->input('shop_id');

    //     // フォームデータから不要な_tokenキーを削除
    //     $shopData = $request->except('_token');
    //     $shopData['shop_admin_id'] = $shop_admin_id;

    //     // ファイルが送信されたか確認
    //     if ($request->hasFile('image')) {
    //         // ファイルが正常にアップロードされたか確認
    //         $img = $request->file('image');
    //         if ($img->isValid()) {
    //             // 保存先のディレクトリが存在するか確認し、存在しない場合は作成
    //             $directory = 'public/img';
    //             Storage::makeDirectory($directory);

    //             // ファイル名をランダムに生成
    //             $filename = uniqid() . '.' . $img->getClientOriginalExtension();

    //             // 画像をpublic/storage/imgに保存
    //             $img->storeAs($directory, $filename);

    //             // 保存されたファイルのパスをデータに追加
    //             $shopData['image'] = 'storage/img/' . $filename;
    //         }
    //     }

    //     // $idを使用して対象の店舗を取得
    //     $shop = Shop::findOrFail($shop_id);

    //     // 取得した店舗情報を更新する
    //     $shop->update($shopData);

    //     // リダイレクト
    //     return redirect()->route('shopAdminView');
    // }


    public function readReserves()
    {
        // ログイン中のユーザーのIDを取得
        $user_id = Auth::id();

        // ログイン中のユーザーの shop_admin_id と一致する店舗情報を取得
        $reserves = Reserve::whereHas('shop', function ($query) use ($user_id) {
            $query->where('shop_admin_id', $user_id);
        })->orderBy('reserved_date', 'asc')->get();

        return view('readReserves', compact('reserves'));
    }

    public function addNewPartnerView()
    {
        return view('addNewPartner');
    }

    public function addNewPartner(Request $request)
    {
        $newPartner = $request->all();

        // パスワードをハッシュ化して保存する
        $newPartner['password'] = Hash::make($request->password);

        User::create($newPartner);

        return redirect()->route('addNewPartnerView');
    }

    public function sendEmailView()
    {
        // ログイン中のユーザーのIDを取得
        $user_id = Auth::id();

        // ログイン中のユーザーの shop_admin_id と一致する店舗情報を取得
        $reserves = Reserve::whereHas('shop', function ($query) use ($user_id) {
            $query->where('shop_admin_id', $user_id);
        })->get();

        return view('sendEmail', compact('reserves'));
    }

    public function sendEmail(Request $request)
    {
        // メールの件名と本文をリクエストから取得する
        $subject = $request->input('subject');
        $body = $request->input('body');
        $recipient = $request->input('recipient');

        // Mailableクラスのインスタンスを生成する
        $notificationEmail = new NotificationEmail($subject, $body);

        // メール送信
        Mail::to($recipient)->send($notificationEmail);

        // 送信成功か確認
        if (count(Mail::failures()) > 0) {
            $message = 'メール送信に失敗しました';

            // 元の画面に戻る
            return back()->withErrors($message);
        } else {
            $message = 'メールを送信しました';

            // 別のページに遷移する
            return redirect()->route('sendEmailView')->with(compact('message'));
        }
    }

    public function sendRemiderEmail()
    {
        //メール送信処理
    }

    public function useQrCode()
    {
        // QRcode
        //ログイン中のユーザーの当日のreserveを表示するページ
        //ログイン画面ー＞店舗代表者ならログイン可能
        //その他の場合は’こちらのページは管理者専用です’と表示させる
        return view('reserveData');
    }
}
