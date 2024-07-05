<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Exception;
use Illuminate\Support\Facades\Validator;

class AdminShopController extends Controller
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

        $img = $request->file('image');
        $filename = uniqid() . '.' . $img->getClientOriginalExtension();
        $img->storeAs('public/img', $filename);
        $newShop['image'] = 'storage/img/' . $filename;

        Shop::create($newShop);

        return redirect()->route('addNewShopView')->with('message', '登録されました！');
    }

    public function editShopView()
    {
        $user_id = Auth::id();
        $shops = Shop::where('shop_admin_id', $user_id)->get();

        return view('editShop', compact('shops'));
    }

    public function editShop(Request $request)
    {
        $shop_admin_id = Auth::id();
        $shop_id = $request->input('shop_id');

        $shopData = $request->except('_token');
        $shopData['shop_admin_id'] = $shop_admin_id;

        $img = $request->file('image');
        $filename = uniqid() . '.' . $img->getClientOriginalExtension();
        $img->storeAs('public/img', $filename);
        $shopData['image'] = 'storage/img/' . $filename;

        $shop = Shop::findOrFail($shop_id);
        $shop->update($shopData);

        return redirect()->route('editShopView')->with('message', '登録されました！');
    }

    public function csvImport(Request $request)
    {
        if ($request->hasFile('csvFile')) {
            $file = $request->file('csvFile');
            $path = $file->getRealPath();
            $fp = fopen($path, 'r');
            fgetcsv($fp);

            while (($csvData = fgetcsv($fp)) !== FALSE) {
                $this->InsertCsvData($csvData);
            }
            fclose($fp);
        } else {
            throw new Exception('CSVファイルの取得に失敗しました。');
        }

        return redirect()->route('addNewShopView')->with('message', '登録されました！');
    }

    public function InsertCsvData($csvData)
    {
        $validator = Validator::make(
            [
                'shop_name' => $csvData[0],
                'area' => $csvData[1],
                'genre' => $csvData[2],
                'introduction' => $csvData[3],
                'image' => $csvData[4],
            ],
            [
                'shop_name' => 'required|string|max:50',
                'area' => ['required', 'integer', 'in:1,2,3'],
                'genre' => ['required', 'string', 'in:1,2,3,4,5'],
                'introduction' => 'required|string|max:400',
                'image' => [
                    'required',
                    'string',
                    //以下、うまくいかなかったバリデーションの部分です。
                    // function ($attribute, $value, $fail) {
                    //     // ファイルが存在しない場合のエラー処理
                    //     if (!file_exists($value)) {
                    //         return $fail('指定された画像ファイルが存在しません。');
                    //     }

                    //     // ファイルが画像形式であることの確認
                    //     $allowedExtensions = ['jpg', 'jpeg', 'png'];
                    //     $extension = pathinfo($value, PATHINFO_EXTENSION);
                    //     if (!in_array(strtolower($extension), $allowedExtensions)) {
                    //         return $fail('画像ファイルの形式はJPEGまたはPNGである必要があります。');
                    //     }
                    // },
                ],
            ],
            [
                'shop_name.required' => '店舗名を入力してください。',
                'shop_name.string' => '店舗名は文字列で入力してください。',
                'shop_name.max:50' => '店舗名は50文字以内で入力してください。',
                'area.required' => '地域を入力してください。',
                'area.string' => '地域は文字列で入力してください。',
                'area.max:255' => '地域を255文字以内で入力してください。。',
                'area.in' => '地域は1（東京都）、2（大阪府）、3（福岡県）のいずれかを入力してください。',
                'genre.required' => 'ジャンルを入力してください。',
                'genre.string' => 'ジャンルは文字列で入力してください。',
                'genre.max' => 'ジャンルを255文字以内で入力してください。',
                'genre.in' => 'ジャンルは1(イタリアン)、2(ラーメン)、3(居酒屋)、4(寿司)、5(焼肉)のいずれかを入力してください。',
                'introduction.required' => '店舗概要を入力してください。',
                'introduction.string' => '店舗概要を文字列で入力してください。',
                'introduction.max' => '店舗概要を400字以内で入力してください。',
                'image.required' => '画像URLを入力してください。',
                'image.string' => '画像URLは文字列で入力してください。',
                //以下、うまく以下なった画像のバリデーションメッセージです。
                // 'image.regex' => '画像URLはjpegかpng形式でなければなりません。',
            ]
        );

        if ($validator->fails()) {
            throw new Exception('CSVデータのバリデーションに失敗しました: ' . implode(', ', $validator->errors()->all()));
        }

        $data = [
            'shop_name' => $csvData[0],
            'area' => $csvData[1],
            'genre' => $csvData[2],
            'introduction' => $csvData[3],
            'image' => $csvData[4],
        ];

        $shop = new Shop;
        $shop->shop_name = $data['shop_name'];
        $shop->area = $data['area'];
        $shop->genre = $data['genre'];
        $shop->introduction = $data['introduction'];
        $shop->shop_admin_id = Auth::id();
        $shop->image = $data['image'];

        //以下、画像をストレージに保存する機能がうまくいかなかった部分です。
        // $imagePath = $data['image'];
        // $imagePath = str_replace('\\', '/', $imagePath);

        // $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
        // $filename = uniqid() . '.' . $extension;

        // $fileContent = file_get_contents($imagePath);
        // Storage::put('public/img/' . $filename, $fileContent);

        // $shop->image = 'storage/img/' . $filename;

        $shop->save();
    }
}
