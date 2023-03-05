<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class Delivery extends Model
{
    use HasFactory;


    /**
     * 配送情報取得
     *
     * @param $id
     * @return false
     */
    public static function getDeliveryInfo($id)
    {
        try {
            $delivery_info = Delivery::find($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getFile());
            Log::error($e->getLine());
            return false;
        }
        return $delivery_info;
    }

    /**
     * 配送表示情報取得
     *
     * @param $delivery_days
     * @return array|false
     */
    public static function getDisplayInfo($delivery_days)
    {
        try {
            // 最短配送日
            $delivery_period = Config::get('delivery.delivery_period');

            // 表示する配送日の数
            $delivery_date_display_num = Config::get('delivery.delivery_date_display_num');

            // 当日発送締切時間
            $delivery_deadline_hour = Config::get('delivery.delivery_deadline_hour');

            // 現在の時刻
            $now = Carbon::now();
            $now_hour = $now->hour;

            // オフセット期間
            $delivery_offset_days = $delivery_period + $delivery_days;
            if ($now_hour >= $delivery_deadline_hour) {
                $delivery_offset_days++;
            }

            $data =[
                'offset_days' => (int)$delivery_offset_days,
                'display_num' => (int)$delivery_date_display_num,
            ];

            $display_info['delivery'] = $data;

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getFile());
            Log::error($e->getLine());
            return false;
        }
        return $display_info;
    }

}
