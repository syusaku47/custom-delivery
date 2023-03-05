<?php

namespace App\Http\Controllers;

use App\Consts\PrefectureConst;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // 配送日設定画面
    public function index(){

        $prefectures = PrefectureConst::LIST;

        return view('delivery.index',[
            'prefectures' => $prefectures
        ]);
    }
}
