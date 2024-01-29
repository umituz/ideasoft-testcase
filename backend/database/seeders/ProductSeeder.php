<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('products')->delete();

        \DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Black&Decker A7062 40 Parça Cırcırlı Tornavida Seti',
                'slug' => 'product-1',
                'short_description' => '1.Voluptas laborum aut ratione ut. Corrupti in distinctio est amet illo molestiae voluptatibus. Magnam natus minus ut atque officia. Rem quia voluptatibus natus corporis.',
                'description' => '1.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis turpis magna, eget blandit lorem pellentesque non. Sed tempor tincidunt nisl vitae egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean lobortis sollicitudin vehicula. Vivamus consequat mi orci, ut pellentesque ipsum ornare ut. Etiam aliquam porta ipsum, nec fermentum nisl dictum a. Curabitur semper magna quis laoreet placerat. Phasellus tristique felis mauris, ac pretium diam lacinia sit amet. Nulla fringilla, sapien ac faucibus ornare, urna felis tincidunt risus, at euismod orci urna ut lectus. Integer id imperdiet nunc. Etiam sed justo nec dolor posuere consequat sed non tortor. Ut et iaculis nibh, ac scelerisque libero. Ut semper magna enim, porta dignissim purus sodales et. Praesent vitae lorem eget sapien laoreet cursus euismod ullamcorper dui. Curabitur dignissim pellentesque est vitae ornare. Cras mollis maximus mauris, consectetur tincidunt dolor suscipit quis. Nam eu ullamcorper turpis. Proin a nisi sit amet turpis dictum posuere. Cras mi ipsum, elementum in consequat sit amet, ornare in eros. Donec congue egestas nibh, eget semper arcu lacinia eu. Pellentesque volutpat sollicitudin porttitor. Sed et auctor leo, eget interdum nibh. Maecenas eu justo interdum, vehicula lacus nec, bibendum purus. Maecenas at lectus velit. Cras a ante non diam efficitur mattis. Nullam vestibulum lobortis fringilla. Pellentesque lectus odio, fermentum sit amet scelerisque vitae, efficitur nec nunc. Duis eu ornare enim. Donec nunc felis, dignissim eget auctor vitae, tempus at tellus. Proin vitae turpis porta, viverra enim id, dignissim nisi. Nulla vitae risus libero. Aenean nibh urna, eleifend id justo ac, vulputate congue nunc. Curabitur elementum nibh non venenatis aliquet. Pellentesque varius lorem quis fringilla molestie. Suspendisse mollis laoreet arcu quis porttitor. Donec malesuada neque non eleifend bibendum. Cras luctus posuere ipsum, eu pellentesque neque accumsan sed. Fusce pellentesque, tortor ut molestie sodales, dui mauris auctor mauris, quis porttitor diam mi id libero. Etiam vestibulum dui id nibh porta faucibus ut eu justo.',
                'price' => '120.75',
                'stock' => 10,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => "Reko Mini Tamir Hassas Tornavida Seti 32'li",
                'slug' => 'product-2',
                'short_description' => '2.Voluptas laborum aut ratione ut. Corrupti in distinctio est amet illo molestiae voluptatibus. Magnam natus minus ut atque officia. Rem quia voluptatibus natus corporis.',
                'description' => '2.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis turpis magna, eget blandit lorem pellentesque non. Sed tempor tincidunt nisl vitae egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean lobortis sollicitudin vehicula. Vivamus consequat mi orci, ut pellentesque ipsum ornare ut. Etiam aliquam porta ipsum, nec fermentum nisl dictum a. Curabitur semper magna quis laoreet placerat. Phasellus tristique felis mauris, ac pretium diam lacinia sit amet. Nulla fringilla, sapien ac faucibus ornare, urna felis tincidunt risus, at euismod orci urna ut lectus. Integer id imperdiet nunc. Etiam sed justo nec dolor posuere consequat sed non tortor. Ut et iaculis nibh, ac scelerisque libero. Ut semper magna enim, porta dignissim purus sodales et. Praesent vitae lorem eget sapien laoreet cursus euismod ullamcorper dui. Curabitur dignissim pellentesque est vitae ornare. Cras mollis maximus mauris, consectetur tincidunt dolor suscipit quis. Nam eu ullamcorper turpis. Proin a nisi sit amet turpis dictum posuere. Cras mi ipsum, elementum in consequat sit amet, ornare in eros. Donec congue egestas nibh, eget semper arcu lacinia eu. Pellentesque volutpat sollicitudin porttitor. Sed et auctor leo, eget interdum nibh. Maecenas eu justo interdum, vehicula lacus nec, bibendum purus. Maecenas at lectus velit. Cras a ante non diam efficitur mattis. Nullam vestibulum lobortis fringilla. Pellentesque lectus odio, fermentum sit amet scelerisque vitae, efficitur nec nunc. Duis eu ornare enim. Donec nunc felis, dignissim eget auctor vitae, tempus at tellus. Proin vitae turpis porta, viverra enim id, dignissim nisi. Nulla vitae risus libero. Aenean nibh urna, eleifend id justo ac, vulputate congue nunc. Curabitur elementum nibh non venenatis aliquet. Pellentesque varius lorem quis fringilla molestie. Suspendisse mollis laoreet arcu quis porttitor. Donec malesuada neque non eleifend bibendum. Cras luctus posuere ipsum, eu pellentesque neque accumsan sed. Fusce pellentesque, tortor ut molestie sodales, dui mauris auctor mauris, quis porttitor diam mi id libero. Etiam vestibulum dui id nibh porta faucibus ut eu justo.',
                'price' => '49.50',
                'stock' => 10,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Viko Karre Anahtar - Beyaz',
                'slug' => 'product-3',
                'short_description' => '3.Voluptas laborum aut ratione ut. Corrupti in distinctio est amet illo molestiae voluptatibus. Magnam natus minus ut atque officia. Rem quia voluptatibus natus corporis.',
                'description' => '3.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis turpis magna, eget blandit lorem pellentesque non. Sed tempor tincidunt nisl vitae egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean lobortis sollicitudin vehicula. Vivamus consequat mi orci, ut pellentesque ipsum ornare ut. Etiam aliquam porta ipsum, nec fermentum nisl dictum a. Curabitur semper magna quis laoreet placerat. Phasellus tristique felis mauris, ac pretium diam lacinia sit amet. Nulla fringilla, sapien ac faucibus ornare, urna felis tincidunt risus, at euismod orci urna ut lectus. Integer id imperdiet nunc. Etiam sed justo nec dolor posuere consequat sed non tortor. Ut et iaculis nibh, ac scelerisque libero. Ut semper magna enim, porta dignissim purus sodales et. Praesent vitae lorem eget sapien laoreet cursus euismod ullamcorper dui. Curabitur dignissim pellentesque est vitae ornare. Cras mollis maximus mauris, consectetur tincidunt dolor suscipit quis. Nam eu ullamcorper turpis. Proin a nisi sit amet turpis dictum posuere. Cras mi ipsum, elementum in consequat sit amet, ornare in eros. Donec congue egestas nibh, eget semper arcu lacinia eu. Pellentesque volutpat sollicitudin porttitor. Sed et auctor leo, eget interdum nibh. Maecenas eu justo interdum, vehicula lacus nec, bibendum purus. Maecenas at lectus velit. Cras a ante non diam efficitur mattis. Nullam vestibulum lobortis fringilla. Pellentesque lectus odio, fermentum sit amet scelerisque vitae, efficitur nec nunc. Duis eu ornare enim. Donec nunc felis, dignissim eget auctor vitae, tempus at tellus. Proin vitae turpis porta, viverra enim id, dignissim nisi. Nulla vitae risus libero. Aenean nibh urna, eleifend id justo ac, vulputate congue nunc. Curabitur elementum nibh non venenatis aliquet. Pellentesque varius lorem quis fringilla molestie. Suspendisse mollis laoreet arcu quis porttitor. Donec malesuada neque non eleifend bibendum. Cras luctus posuere ipsum, eu pellentesque neque accumsan sed. Fusce pellentesque, tortor ut molestie sodales, dui mauris auctor mauris, quis porttitor diam mi id libero. Etiam vestibulum dui id nibh porta faucibus ut eu justo.',
                'price' => '11.28',
                'stock' => 10,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Legrand Salbei Anahtar, Alüminyum',
                'slug' => 'product-4',
                'short_description' => '4.Voluptas laborum aut ratione ut. Corrupti in distinctio est amet illo molestiae voluptatibus. Magnam natus minus ut atque officia. Rem quia voluptatibus natus corporis.',
                'description' => '4.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis turpis magna, eget blandit lorem pellentesque non. Sed tempor tincidunt nisl vitae egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean lobortis sollicitudin vehicula. Vivamus consequat mi orci, ut pellentesque ipsum ornare ut. Etiam aliquam porta ipsum, nec fermentum nisl dictum a. Curabitur semper magna quis laoreet placerat. Phasellus tristique felis mauris, ac pretium diam lacinia sit amet. Nulla fringilla, sapien ac faucibus ornare, urna felis tincidunt risus, at euismod orci urna ut lectus. Integer id imperdiet nunc. Etiam sed justo nec dolor posuere consequat sed non tortor. Ut et iaculis nibh, ac scelerisque libero. Ut semper magna enim, porta dignissim purus sodales et. Praesent vitae lorem eget sapien laoreet cursus euismod ullamcorper dui. Curabitur dignissim pellentesque est vitae ornare. Cras mollis maximus mauris, consectetur tincidunt dolor suscipit quis. Nam eu ullamcorper turpis. Proin a nisi sit amet turpis dictum posuere. Cras mi ipsum, elementum in consequat sit amet, ornare in eros. Donec congue egestas nibh, eget semper arcu lacinia eu. Pellentesque volutpat sollicitudin porttitor. Sed et auctor leo, eget interdum nibh. Maecenas eu justo interdum, vehicula lacus nec, bibendum purus. Maecenas at lectus velit. Cras a ante non diam efficitur mattis. Nullam vestibulum lobortis fringilla. Pellentesque lectus odio, fermentum sit amet scelerisque vitae, efficitur nec nunc. Duis eu ornare enim. Donec nunc felis, dignissim eget auctor vitae, tempus at tellus. Proin vitae turpis porta, viverra enim id, dignissim nisi. Nulla vitae risus libero. Aenean nibh urna, eleifend id justo ac, vulputate congue nunc. Curabitur elementum nibh non venenatis aliquet. Pellentesque varius lorem quis fringilla molestie. Suspendisse mollis laoreet arcu quis porttitor. Donec malesuada neque non eleifend bibendum. Cras luctus posuere ipsum, eu pellentesque neque accumsan sed. Fusce pellentesque, tortor ut molestie sodales, dui mauris auctor mauris, quis porttitor diam mi id libero. Etiam vestibulum dui id nibh porta faucibus ut eu justo.',
                'price' => '22.80',
                'stock' => 10,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Schneider Asfora Beyaz Komütatör',
                'slug' => 'product-5',
                'short_description' => '5.Voluptas laborum aut ratione ut. Corrupti in distinctio est amet illo molestiae voluptatibus. Magnam natus minus ut atque officia. Rem quia voluptatibus natus corporis.',
                'description' => '5.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis turpis magna, eget blandit lorem pellentesque non. Sed tempor tincidunt nisl vitae egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean lobortis sollicitudin vehicula. Vivamus consequat mi orci, ut pellentesque ipsum ornare ut. Etiam aliquam porta ipsum, nec fermentum nisl dictum a. Curabitur semper magna quis laoreet placerat. Phasellus tristique felis mauris, ac pretium diam lacinia sit amet. Nulla fringilla, sapien ac faucibus ornare, urna felis tincidunt risus, at euismod orci urna ut lectus. Integer id imperdiet nunc. Etiam sed justo nec dolor posuere consequat sed non tortor. Ut et iaculis nibh, ac scelerisque libero. Ut semper magna enim, porta dignissim purus sodales et. Praesent vitae lorem eget sapien laoreet cursus euismod ullamcorper dui. Curabitur dignissim pellentesque est vitae ornare. Cras mollis maximus mauris, consectetur tincidunt dolor suscipit quis. Nam eu ullamcorper turpis. Proin a nisi sit amet turpis dictum posuere. Cras mi ipsum, elementum in consequat sit amet, ornare in eros. Donec congue egestas nibh, eget semper arcu lacinia eu. Pellentesque volutpat sollicitudin porttitor. Sed et auctor leo, eget interdum nibh. Maecenas eu justo interdum, vehicula lacus nec, bibendum purus. Maecenas at lectus velit. Cras a ante non diam efficitur mattis. Nullam vestibulum lobortis fringilla. Pellentesque lectus odio, fermentum sit amet scelerisque vitae, efficitur nec nunc. Duis eu ornare enim. Donec nunc felis, dignissim eget auctor vitae, tempus at tellus. Proin vitae turpis porta, viverra enim id, dignissim nisi. Nulla vitae risus libero. Aenean nibh urna, eleifend id justo ac, vulputate congue nunc. Curabitur elementum nibh non venenatis aliquet. Pellentesque varius lorem quis fringilla molestie. Suspendisse mollis laoreet arcu quis porttitor. Donec malesuada neque non eleifend bibendum. Cras luctus posuere ipsum, eu pellentesque neque accumsan sed. Fusce pellentesque, tortor ut molestie sodales, dui mauris auctor mauris, quis porttitor diam mi id libero. Etiam vestibulum dui id nibh porta faucibus ut eu justo.',
                'price' => '12.95',
                'stock' => 10,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
