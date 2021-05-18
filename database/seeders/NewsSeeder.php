<?php

namespace Database\Seeders;

use App\Http\Controllers\ParserController;
use App\Services\ParserService;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Psy\Util\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }


    public function getData():array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i=0; $i <50; $i++)
        {
            $title = $faker->sentence(mt_rand(2,5));
            $data[] = [
                'title_news' => $title,
                'shortDesc' => $faker->text(mt_rand(50,100)),
                'fullDesc' => $faker->text(mt_rand(200,300)),
                'category_id' => mt_rand(1,5),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        dd($data);
        return $data;
    }
}
