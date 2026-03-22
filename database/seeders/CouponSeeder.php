<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
            [
                'code' => 'WELCOME10',
                'name' => 'Welcome Discount',
                'description' => 'Get 10% off on your first order.',
                'max_uses' => 100,
                'max_uses_user' => 1,
                'type' => 'percent',
                'discount_amount' => 10,
                'min_amount' => 500.00,
                'status' => 1,
                'starts_at' => Carbon::now(),
                'expires_at' => Carbon::now()->addMonths(1),
            ],
            [
                'code' => 'FLAT50',
                'name' => 'Flat 50 Taka Off',
                'description' => 'Flat 50 Taka discount on orders above 300.',
                'max_uses' => 50,
                'max_uses_user' => 1,
                'type' => 'fixed',
                'discount_amount' => 50,
                'min_amount' => 300.00,
                'status' => 1,
                'starts_at' => Carbon::now(),
                'expires_at' => Carbon::now()->addDays(15),
            ],
            [
                'code' => 'EID2024',
                'name' => 'Eid Special',
                'description' => 'Special Eid discount of 20%.',
                'max_uses' => null,
                'max_uses_user' => null,
                'type' => 'percent',
                'discount_amount' => 20,
                'min_amount' => 1000.00,
                'status' => 1,
                'starts_at' => Carbon::parse('2024-06-10 00:00:00'),
                'expires_at' => Carbon::parse('2024-06-20 23:59:59'),
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::updateOrCreate(['code' => $coupon['code']], $coupon);
        }
    }
}
