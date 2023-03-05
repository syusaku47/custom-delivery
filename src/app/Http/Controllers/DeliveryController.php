<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // 配送日設定画面
    public function index(){
        return view('delivery.index');
    }
}
