<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Meme'
            ],
            [
                'name' => 'Funny'
            ],
            [
                'name' => 'World War'
            ]
        ];

        foreach( $data as $category){
            category::create($category);
        }
    }
}
