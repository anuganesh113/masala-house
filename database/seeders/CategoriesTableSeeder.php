<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => '',
                    'slug' => 'street-foods',
                    'image' => 'masala-house-files-c6v04kyxnff.jpg',
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-18 13:45:24',
                    'updated_at' => '2026-02-20 13:10:34',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'Lunch Combo',
                    'slug' => 'lunch-combo',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:00:53',
                    'updated_at' => '2026-02-19 11:00:53',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'From the Himalayas',
                    'slug' => 'from-the-himalayas',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:01:03',
                    'updated_at' => '2026-02-19 11:01:03',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'Indian Street Food',
                    'slug' => 'indian-street-food',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:01:16',
                    'updated_at' => '2026-02-19 11:01:16',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => 'Apetizer',
                    'slug' => 'apetizer',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:01:26',
                    'updated_at' => '2026-02-19 11:01:26',
                ),
            5 =>
                array(
                    'id' => 6,
                    'name' => 'Sides',
                    'slug' => 'sides',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:01:33',
                    'updated_at' => '2026-02-19 11:01:33',
                ),
            6 =>
                array(
                    'id' => 7,
                    'name' => 'Drinks',
                    'slug' => 'drinks',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:01:40',
                    'updated_at' => '2026-02-19 11:01:40',
                ),
            7 =>
                array(
                    'id' => 8,
                    'name' => 'Biryani',
                    'slug' => 'biryani',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:01:48',
                    'updated_at' => '2026-02-19 11:01:48',
                ),
            8 =>
                array(
                    'id' => 9,
                    'name' => 'Thalis',
                    'slug' => 'thalis',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:01:56',
                    'updated_at' => '2026-02-19 11:01:56',
                ),
            9 =>
                array(
                    'id' => 10,
                    'name' => 'Indo Chinese',
                    'slug' => 'indo-chinese',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:02:03',
                    'updated_at' => '2026-02-19 11:02:03',
                ),
            10 =>
                array(
                    'id' => 11,
                    'name' => 'Entree',
                    'slug' => 'entree',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:02:09',
                    'updated_at' => '2026-02-19 11:02:09',
                ),
            11 =>
                array(
                    'id' => 12,
                    'name' => 'From Tandoor',
                    'slug' => 'from-tandoor',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 11:02:15',
                    'updated_at' => '2026-02-19 11:02:15',
                ),
            12 =>
                array(
                    'id' => 13,
                    'name' => 'Family Together',
                    'slug' => 'family-together',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 12:45:18',
                    'updated_at' => '2026-02-19 12:45:18',
                ),
            13 =>
                array(
                    'id' => 14,
                    'name' => 'Our Popular Menu',
                    'slug' => 'our-popular-menu',
                    'image' => NULL,
                    'description' => NULL,
                    'metadata' => NULL,
                    'seo' => NULL,
                    'created_at' => '2026-02-19 12:49:10',
                    'updated_at' => '2026-02-19 12:49:10',
                ),
        ));


    }
}