<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $items = [
            'Sushi & Nigiri' => [
                [
                    'name' => 'Aburi Salmon Belly Sushi Nigiri',
                    'description' => 'Torched salmon belly sushi with a smoky finish.',
                    'price' => 450.00,
                    'image' => 'images/items/AburiSalmonBellySushiNigiri_1024x1024.jpg',
                ],
                [
                    'name' => 'Ebi Sushi Nigiri',
                    'description' => 'Classic cooked shrimp over hand-pressed sushi rice.',
                    'price' => 380.00,
                    'image' => 'images/items/EbiSushiNigiri_1024x1024.jpg',
                ],
                [
                    'name' => 'Salmon Sushi Nigiri',
                    'description' => 'Fresh Atlantic salmon over sushi rice.',
                    'price' => 400.00,
                    'image' => 'images/items/SalmonSushiNigiri_1024x1024.jpg',
                ],
            ],
            'Maki Rolls' => [
                [
                    'name' => 'Chicken Cheese Maki Roll',
                    'description' => 'Crispy chicken and creamy cheese wrapped in seaweed.',
                    'price' => 550.00,
                    'image' => 'images/items/ChickenCheeseMakiRoll_1024x1024.jpg',
                ],
                [
                    'name' => 'Deep Fried Shrimp Maki Roll',
                    'description' => 'Crunchy tempura shrimp maki with spicy mayo.',
                    'price' => 600.00,
                    'image' => 'images/items/DeepFriedShrimpMakiRoll_1024x1024.jpg',
                ],
                [
                    'name' => 'Dragon Maki Roll',
                    'description' => 'Eel and cucumber inside, topped with avocado.',
                    'price' => 750.00,
                    'image' => 'images/items/DragonMakiRoll_1024x1024.jpg',
                ],
                [
                    'name' => 'Spicy Salmon Maki Roll',
                    'description' => 'Fresh salmon with spicy mayo and cucumber.',
                    'price' => 580.00,
                    'image' => 'images/items/SpicySalmonMakiRoll_1024x1024.jpg',
                ],
                [
                    'name' => 'Sunset Maki Roll',
                    'description' => 'Signature roll with crab, avocado, and fish roe.',
                    'price' => 650.00,
                    'image' => 'images/items/SunsetMakiRoll_1_1024x1024.jpg',
                ],
            ],
            'Grill & Teppanyaki' => [
                [
                    'name' => 'Beef Cheese Skewer',
                    'description' => 'Tender beef wrapped around gooey cheese, grilled with yakitori sauce.',
                    'price' => 320.00,
                    'image' => 'images/items/BeefCheeseSkewer_1024x1024.jpg',
                ],
                [
                    'name' => 'Beef Teppanyaki',
                    'description' => 'Premium beef tossed on the grill with seasonal vegetables.',
                    'price' => 850.00,
                    'image' => 'images/items/BeefTeppanyaki_1024x1024.jpg',
                ],
                [
                    'name' => 'Chicken Cheese Yaki',
                    'description' => 'Grilled chicken skewers topped with melted cheese.',
                    'price' => 280.00,
                    'image' => 'images/items/Chicken-Cheese-Yaki-02copy_1_1024x1024.jpg',
                ],
                [
                    'name' => 'Seafood Teppanyaki',
                    'description' => 'Medley of shrimp, fish, and scallops grilled to perfection.',
                    'price' => 950.00,
                    'image' => 'images/items/SeafoodTeppanyaki_1024x1024.jpg',
                ],
                [
                    'name' => 'Kushiage',
                    'description' => 'Deep-fried meat and vegetable skewers.',
                    'price' => 450.00,
                    'image' => 'images/items/Kushiage_1024x1024.jpg',
                ],
            ],
            'Appetizers & Sides' => [
                [
                    'name' => 'Chicken Bao',
                    'description' => 'Soft steamed buns filled with crispy chicken and pickled vegetables.',
                    'price' => 250.00,
                    'image' => 'images/items/ChickenBao_1024x1024.jpg',
                ],
                [
                    'name' => 'Chicken Ebi Gyoza',
                    'description' => 'Pan-fried dumplings with chicken and shrimp filling.',
                    'price' => 300.00,
                    'image' => 'images/items/Chicken_EbiGyoza_1024x1024.jpg',
                ],
                [
                    'name' => 'Sesame Edamame',
                    'description' => 'Steamed soybeans tossed with toasted sesame salt.',
                    'price' => 150.00,
                    'image' => 'images/items/SesameEdamame_1024x1024.jpg',
                ],
                [
                    'name' => 'Vegetable Tempura',
                    'description' => 'Lightly battered and deep-fried seasonal vegetables.',
                    'price' => 350.00,
                    'image' => 'images/items/VegetableTempura_1024x1024.jpg',
                ],
                [
                    'name' => 'Baked Miso Scallop Shell',
                    'description' => 'Scallops baked in shell with creamy miso sauce.',
                    'price' => 550.00,
                    'image' => 'images/items/BakedMisoScallopShell_1024x1024.jpg',
                ],
            ],
            'Sashimi & Tartare' => [
                [
                    'name' => 'Salmon Sashimi',
                    'description' => 'Thick slices of fresh Atlantic salmon.',
                    'price' => 650.00,
                    'image' => 'images/items/SalmonSashimi_1024x1024.jpg',
                ],
                [
                    'name' => 'Salmon Carpaccio',
                    'description' => 'Thinly sliced salmon drizzled with truffle yuzu dressing.',
                    'price' => 700.00,
                    'image' => 'images/items/SalmonCarpaccio_1024x1024.jpg',
                ],
                [
                    'name' => 'Miso Salmon Tartare Cone',
                    'description' => 'Fresh salmon tartare in a crispy cone with miso dressing.',
                    'price' => 450.00,
                    'image' => 'images/items/MisoSalmonTartareCone_ed_1024x1024.jpg',
                ],
            ],
        ];

        foreach ($items as $categoryName => $itemList) {
            $category = $categories->where('name', $categoryName)->first();
            if ($category) {
                foreach ($itemList as $itemData) {
                    Item::updateOrCreate(
                        ['name' => $itemData['name'], 'category_id' => $category->id],
                        $itemData
                    );
                }
            }
        }
    }
}
