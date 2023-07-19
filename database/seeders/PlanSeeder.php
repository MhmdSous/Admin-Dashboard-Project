<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plans = [
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'stripe_plan' => 'price_1LXOzsGzlk2XAanfTskz9n',
                'price' => 10,
                'description' => 'Basic'
            ],
            [
                'name' => 'Premium',
                'slug' => 'premium',
                'stripe_plan' => 'price_1LXP23Gzlk2XAanf4zQZdi',
                'price' => 100,
                'description' => 'Premium'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
