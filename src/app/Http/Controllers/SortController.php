<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class SortController extends Controller
{
    public function sort()
    {
        $shops = Shop::sortable()->get();
        return view('home', compact('shops'));
    }
}
