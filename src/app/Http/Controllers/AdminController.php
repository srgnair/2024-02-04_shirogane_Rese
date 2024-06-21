<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function mainAdminView()
    {
        return view('mainAdmin');
    }
    public function shopAdminView()
    {
        return view('shopAdmin');
    }
    
}