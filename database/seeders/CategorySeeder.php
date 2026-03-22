<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sushi & Nigiri',
                'description' => 'Fine slices of fresh fish over hand-pressed vinegared rice.',
            ],
            [
                'name' => 'Maki Rolls',
                'description' => 'Classic and creative sushi rolls wrapped in roasted seaweed.',
            ],
            [
                'name' => 'Grill & Teppanyaki',
                'description' => 'Flame-grilled skewers and hot plate specialties.',
            ],
            [
                'name' => 'Appetizers & Sides',
                'description' => 'Traditional Japanese starters and side dishes.',
            ],
            [
                'name' => 'Sashimi & Tartare',
                'description' => 'Premium cuts of raw seafood served with authentic accompaniments.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}
