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
        //Category::factory(2)->create();

        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
                array (
                    'name' => 'Giyim',
                    'status' => 1,
                    'deleted_at' => NULL,
                    'created_at' => '2024-01-27 15:55:32',
                    'updated_at' => '2024-01-27 15:55:32',
                ),
                array (
                    'name' => 'Elektronik',
                    'status' => 1,
                    'deleted_at' => NULL,
                    'created_at' => '2024-01-27 15:55:32',
                    'updated_at' => '2024-01-27 15:55:32',
                ),
        ));
    }
}
