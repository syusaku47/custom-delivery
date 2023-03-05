<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        try {
            // 都道府県毎の配送情報取得
            $prefecture_id = $request->prefecture_id;
            $delivery_info = Delivery::getDeliveryInfo($prefecture_id);

            if (is_null($delivery_info)) {
                return $this->jsonResponse('配送日情報が存在しません', 404);
            }

            if (!$delivery_info) {
                return $this->jsonResponse('配送日情報の取得に失敗しました', 500);
            }

            $delivery_days = $delivery_info->delivery_days;
            $display_info = Delivery::getDisplayInfo($delivery_days);

            if (!$display_info) {
                return $this->jsonResponse('配送表示情報の取得に失敗しました', 500);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getFile());
            Log::error($e->getLine());
            return $this->jsonResponse('システムエラーが発生しました。管理者にご連絡ください。', 500);
        }
        return $this->jsonResponse($display_info);

    }
}
