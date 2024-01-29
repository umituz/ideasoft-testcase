<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'model_type' => 'App\\Models\\Product',
                'model_id' => 1,
                'uuid' => 'c6294933-6ac3-44b6-818d-ae2a9696800a',
                'collection_name' => 'default',
                'name' => 'dummy-image',
                'file_name' => 'dummy-image.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'media',
                'conversions_disk' => 'media',
                'size' => 7658,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2024-01-29 03:40:33',
                'updated_at' => '2024-01-29 03:40:33',
            ),
            1 => 
            array (
                'model_type' => 'App\\Models\\Product',
                'model_id' => 2,
                'uuid' => '7fd1f7de-5d02-4eea-b8d0-9e8211ab1950',
                'collection_name' => 'default',
                'name' => 'dummy-image',
                'file_name' => 'dummy-image.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'media',
                'conversions_disk' => 'media',
                'size' => 7658,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2024-01-29 03:45:28',
                'updated_at' => '2024-01-29 03:45:28',
            ),
            2 => 
            array (
                'model_type' => 'App\\Models\\Product',
                'model_id' => 3,
                'uuid' => '4474b685-1570-4e84-8b6a-bab7fa59f04a',
                'collection_name' => 'default',
                'name' => 'dummy-image',
                'file_name' => 'dummy-image.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'media',
                'conversions_disk' => 'media',
                'size' => 7658,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2024-01-29 03:45:31',
                'updated_at' => '2024-01-29 03:45:31',
            ),
            3 => 
            array (
                'model_type' => 'App\\Models\\Product',
                'model_id' => 4,
                'uuid' => '4e6d5bf7-96c9-4eee-bd2a-e8e1254f3228',
                'collection_name' => 'default',
                'name' => 'dummy-image',
                'file_name' => 'dummy-image.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'media',
                'conversions_disk' => 'media',
                'size' => 7658,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2024-01-29 03:45:33',
                'updated_at' => '2024-01-29 03:45:33',
            ),
            4 => 
            array (
                'model_type' => 'App\\Models\\Product',
                'model_id' => 5,
                'uuid' => 'a121b476-311e-4934-b3a2-43af93704837',
                'collection_name' => 'default',
                'name' => 'dummy-image',
                'file_name' => 'dummy-image.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'media',
                'conversions_disk' => 'media',
                'size' => 7658,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2024-01-29 03:45:36',
                'updated_at' => '2024-01-29 03:45:36',
            ),
        ));
        
        
    }
}