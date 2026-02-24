<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 2,
                'name' => 'ApetizerApetizerApetizer',
                'slug' => 'momno',
                'image' => 'about-us.png',
                'image_alt' => 'momo',
                'excerpt' => NULL,
                'description' => NULL,
                'old_price' => '200.00',
                'price' => '180.00',
                'type' => 'veg',
                'status' => '0',
                'seo' => '{"title":"Quidem sed nemo ulla","keywords":null,"description":null}',
                'created_at' => '2026-02-18 18:03:48',
                'updated_at' => '2026-02-23 11:47:14',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'name' => 'MO MO',
                'slug' => 'manager',
                'image' => 'masala-house-files-b3hwsuxq5em.jpg',
                'image_alt' => NULL,
                'excerpt' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'description' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'old_price' => '120.00',
                'price' => '100.00',
                'type' => 'non-veg',
                'status' => '0',
                'seo' => '{"title":null,"keywords":null,"description":null}',
                'created_at' => '2026-02-19 11:57:30',
                'updated_at' => '2026-02-23 11:24:55',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'name' => 'werwerwerewrwe',
                'slug' => 'werwerwerewrwe',
                'image' => 'about-us.png',
                'image_alt' => NULL,
                'excerpt' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'description' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'old_price' => '150.00',
                'price' => '110.00',
                'type' => 'veg',
                'status' => '0',
                'seo' => '{"title":null,"keywords":null,"description":null}',
                'created_at' => '2026-02-19 12:01:12',
                'updated_at' => '2026-02-22 12:47:17',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 13,
                'name' => 'Family TogetherFamily TogetherFamily Together',
                'slug' => 'family-togetherfamily-togetherfamily-together',
                'image' => NULL,
                'image_alt' => NULL,
                'excerpt' => NULL,
                'description' => NULL,
                'old_price' => '160.00',
                'price' => '150.00',
                'type' => 'veg',
                'status' => '0',
                'seo' => '{"title":null,"keywords":null,"description":null}',
                'created_at' => '2026-02-19 12:46:13',
                'updated_at' => '2026-02-19 12:46:13',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 14,
                'name' => 'Our Popular Menu',
                'slug' => 'our-popular-menu',
                'image' => NULL,
                'image_alt' => NULL,
                'excerpt' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'description' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'old_price' => '500.00',
                'price' => '400.00',
                'type' => 'veg',
                'status' => '0',
                'seo' => '{"title":null,"keywords":null,"description":null}',
                'created_at' => '2026-02-19 12:49:36',
                'updated_at' => '2026-02-22 12:47:06',
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 1,
                'name' => 'Family Together Family Together Family Together',
                'slug' => 'fasdsadasdsad-family-together',
                'image' => 'masala-house-files-tu37fojml5m.png',
                'image_alt' => NULL,
                'excerpt' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'description' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'old_price' => '500.00',
                'price' => '250.00',
                'type' => 'non-veg',
                'status' => '1',
                'seo' => '{"title":null,"keywords":null,"description":null}',
                'created_at' => '2026-02-19 12:54:51',
                'updated_at' => '2026-02-23 12:28:02',
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 14,
                'name' => 'werwerewrw',
                'slug' => 'werwerewrw',
                'image' => NULL,
                'image_alt' => NULL,
                'excerpt' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'description' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'old_price' => '120.00',
                'price' => '100.00',
                'type' => 'veg',
                'status' => '0',
                'seo' => '{"title":null,"keywords":null,"description":null}',
                'created_at' => '2026-02-22 13:05:55',
                'updated_at' => '2026-02-22 13:05:55',
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 1,
                'name' => 'Street Foods',
                'slug' => 'street-foods',
                'image' => NULL,
                'image_alt' => NULL,
                'excerpt' => '<p>Street FoodsStreet FoodsStreet Foods</p>',
                'description' => NULL,
                'old_price' => '150.00',
                'price' => '140.00',
                'type' => 'veg',
                'status' => '0',
                'seo' => '{"title":null,"keywords":null,"description":null}',
                'created_at' => '2026-02-22 14:55:00',
                'updated_at' => '2026-02-22 14:55:00',
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 1,
                'name' => 'Street FoodsStreet F',
                'slug' => 'street-foodsstreet-foodsstreet-foodsstreet-foodsstreet-foodsstreet-foods',
                'image' => NULL,
                'image_alt' => 'Laboriosam alias so',
                'excerpt' => NULL,
                'description' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like</p>',
                'old_price' => '250.00',
                'price' => '200.00',
                'type' => 'veg',
                'status' => '1',
                'seo' => '{"title":null,"keywords":null,"description":null}',
                'created_at' => '2026-02-22 14:55:25',
                'updated_at' => '2026-02-23 12:33:29',
            ),
        ));
        
        
    }
}