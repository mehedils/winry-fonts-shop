<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'হাতের লেখা',
                'slug' => 'handwriting',
                'description' => 'হাতের লেখার মত দেখতে ফন্টসমূহ',
            ],
            [
                'name' => 'বোল্ড',
                'slug' => 'bold',
                'description' => 'মোটা এবং শক্তিশালী ফন্টসমূহ',
            ],
            [
                'name' => 'পাতলা',
                'slug' => 'thin',
                'description' => 'পাতলা এবং সূক্ষ্ম ফন্টসমূহ',
            ],
            [
                'name' => 'ডেকোরেটিভ',
                'slug' => 'decorative',
                'description' => 'সাজানো এবং শৈল্পিক ফন্টসমূহ',
            ],
            [
                'name' => 'সেরিফ',
                'slug' => 'serif',
                'description' => 'সেরিফ ফন্টসমূহ',
            ],
            [
                'name' => 'স্যানস-সেরিফ',
                'slug' => 'sans-serif',
                'description' => 'স্যানস-সেরিফ ফন্টসমূহ',
            ],
            [
                'name' => 'হেডলাইন',
                'slug' => 'headline',
                'description' => 'শিরোনামের জন্য উপযুক্ত ফন্টসমূহ',
            ],
            [
                'name' => 'বডি টেক্সট',
                'slug' => 'body-text',
                'description' => 'পাঠ্যের জন্য উপযুক্ত ফন্টসমূহ',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'is_active' => true,
                ]
            );
        }
    }
}
