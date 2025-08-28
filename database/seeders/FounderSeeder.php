<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Founder;

class FounderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $founders = [
            [
                'name' => 'আরিফিন রহমান নিলয়',
                'designation' => 'প্রতিষ্ঠাতা ও প্রধান নির্বাহী কর্মকর্তা',
                'website' => 'https://arifinrahman.com',
                'facebook' => 'https://facebook.com/arifinrahman',
                'twitter' => 'https://twitter.com/arifinrahman',
                'linkedin' => 'https://linkedin.com/in/arifinrahman',
                'sort_order' => 1,
            ],
            [
                'name' => 'গোবিন্দ মজুমদার',
                'designation' => 'সহ-প্রতিষ্ঠাতা ও সৃজনশীল পরিচালক',
                'website' => 'https://gobindamajumder.com',
                'facebook' => 'https://facebook.com/gobindamajumder',
                'twitter' => 'https://twitter.com/gobindamajumder',
                'whatsapp' => '+8801234567890',
                'sort_order' => 2,
            ],
            [
                'name' => 'হামেদ মোহাম্মদ আদেল',
                'designation' => 'সহ-প্রতিষ্ঠাতা ও প্রযুক্তি প্রধান',
                'linkedin' => 'https://linkedin.com/in/hamedadel',
                'whatsapp' => '+8801234567891',
                'sort_order' => 3,
            ],
            [
                'name' => 'ইমন হাসান',
                'designation' => 'সহ-প্রতিষ্ঠাতা ও পরিচালনা ব্যবস্থাপক',
                'facebook' => 'https://facebook.com/emonhasan',
                'whatsapp' => '+8801234567892',
                'behance' => 'https://behance.net/emonhasan',
                'sort_order' => 4,
            ],
            [
                'name' => 'মোঃ সামিউল আলম সাজিব',
                'designation' => 'সহ-প্রতিষ্ঠাতা ও ভিজ্যুয়াল ও বিপণন প্রধান',
                'facebook' => 'https://facebook.com/samiulalam',
                'behance' => 'https://behance.net/samiulalam',
                'linkedin' => 'https://linkedin.com/in/samiulalam',
                'whatsapp' => '+8801234567893',
                'sort_order' => 5,
            ],
        ];

        foreach ($founders as $founder) {
            Founder::updateOrCreate(
                ['name' => $founder['name']],
                $founder
            );
        }
    }
}
