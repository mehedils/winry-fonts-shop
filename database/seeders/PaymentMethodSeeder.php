<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            [
                'name' => 'bkash',
                'display_name' => 'bKash',
                'account_number' => '01XXXXXXXXX',
                'account_type' => 'personal',
                'icon_class' => 'fas fa-mobile-alt',
                'color_class' => 'bg-pink-100',
                'is_active' => true,
                'sort_order' => 1,
                'instructions' => 'Send Money অপশন ব্যবহার করুন'
            ],
            [
                'name' => 'nagad',
                'display_name' => 'Nagad',
                'account_number' => '01XXXXXXXXX',
                'account_type' => 'personal',
                'icon_class' => 'fas fa-mobile-alt',
                'color_class' => 'bg-orange-100',
                'is_active' => true,
                'sort_order' => 2,
                'instructions' => 'Send Money অপশন ব্যবহার করুন'
            ],
            [
                'name' => 'rocket',
                'display_name' => 'Rocket',
                'account_number' => '01XXXXXXXXX',
                'account_type' => 'personal',
                'icon_class' => 'fas fa-rocket',
                'color_class' => 'bg-purple-100',
                'is_active' => true,
                'sort_order' => 3,
                'instructions' => 'Cash Out অপশন ব্যবহার করুন'
            ],
            [
                'name' => 'upay',
                'display_name' => 'Upay',
                'account_number' => '01XXXXXXXXX',
                'account_type' => 'merchant',
                'icon_class' => 'fas fa-credit-card',
                'color_class' => 'bg-green-100',
                'is_active' => true,
                'sort_order' => 4,
                'instructions' => 'Payment অপশন ব্যবহার করুন'
            ],
        ];

        foreach ($paymentMethods as $method) {
            PaymentMethod::create($method);
        }
    }
}
