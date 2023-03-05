<?php

namespace Database\Seeders;

use App\Consts\PrefectureConst;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefectures = PrefectureConst::LIST;
        foreach ($prefectures as $index => $val) {
            switch ($val) {
                case  '北海道':
                    $delivery_days = 2;
                    break;
                case  '沖縄県':
                    $delivery_days = 3;
                    break;
                default:
                    $delivery_days = 1;
            }
            DB::table('deliveries')->insert([
                'prefecture_id' => $index,
                'delivery_days' => $delivery_days,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}