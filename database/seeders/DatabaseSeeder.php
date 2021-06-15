<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Episode;
use App\Models\Character;
use App\Models\Quote;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $episodes = Episode::factory()->count(15)->create(); // Создаем эпизоды

        foreach ($episodes as $key => $episode) {   
            $characters = Character::factory()->count(rand(5, 15))->create(); // Для каждого эпизода создаем персонажей
            foreach ($characters as $k => $character) {
                $episode->characters()->attach($character->id); // Связываем эпизод и персонажа
                $countQuotes = rand(3,7);
                for ($i=0; $i < $countQuotes; $i++) { 
                    Quote::create([
                        'quote' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                        'character_id' => $character->id,
                        'episode_id' => $episode->id,
                    ]);
                }
            }
        }
    }
}
