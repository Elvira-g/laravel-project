<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    public function getData():array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i=0; $i <5; $i++)
        {
            $title = $faker->sentence(mt_rand(2,5));
            $data[] = [
                'title_category' => $title,
                'slug' => \Illuminate\Support\Str::slug($title),
                'description' => $faker->text(mt_rand(30,50)),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
