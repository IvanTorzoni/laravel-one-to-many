<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Web Application',
            'Mobile Application',
            'Frontend Development',
            'Backend Development',
            'Database Development',
            'Game Development',
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}
