<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Shore;

class ShoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $randomThumb = [
            'https://images.pexels.com/photos/17666956/pexels-photo-17666956/free-photo-of-people-on-beach.jpeg?auto=compress&cs=tinysrgb&w=1600',
            'https://images.pexels.com/photos/17666958/pexels-photo-17666958/free-photo-of-palm-trees-around-street-near-beach-in-town.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            'https://www.mondobalneare.com/wp-content/uploads/2021/10/lido-1.jpg',
            'https://www.hotelvillaave.it/wp-content/uploads/2017/03/Spiaggia-a-Finale-Ligure-Bandiera-Blu-Hotel-Villa-Ave-Albergo-a-due-passi-dal-mare-in-Liguria.jpg',
            'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.bookyourbeach.net%2F&psig=AOvVaw0TJUUwrnwdTWxyC0jFc0ac&ust=1690622617048000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCOCPxJaKsYADFQAAAAAdAAAAABAj',
            'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/04/a4/90/4c/playa-del-sol.jpg?w=1200&h=-1&s=1',
        ];
        for ($i = 0 ; $i < 40; $i++) {
            $newShore = new Shore;
            $newShore->name = $faker->company();
            $newShore->location = $faker->streetAddress(); 
            $newShore->beach_umbrella = $faker->numberBetween(30, 300);
            $newShore->beach_bed = $faker->numberBetween(60, 600);
            $newShore->daily_price = $faker->randomFloat(2, 10, 40);
            $newShore->opening_date = $faker->date();
            $newShore->closing_date = $faker->date('y-m-d', 'now');
            $newShore->has_volley_field = $faker->boolean();
            $newShore->has_soccer_field = $faker->boolean();
            $newShore->thumb = $faker->randomElement($randomThumb);
            $newShore->save();
        }

    }
}
