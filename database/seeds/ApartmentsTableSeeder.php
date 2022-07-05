<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Apartment;
use Illuminate\Support\Str;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 10; $i++) {
            $newApartment = new Apartment();
            $newApartment->id_user = $i + 1;
            $newApartment->title = $faker->name();
            $newApartment->description = $faker->text();
            $newApartment->cover_image = $faker->imageUrl(250, 250, 'apartments', true);
            $newApartment->latitude = $faker->latitude($min = -90, $max = 90);
            $newApartment->longitude = $faker->longitude($min = -180, $max = 180);
            $newApartment->address = $faker->address();
            $newApartment->rooms = $faker->randomNumber(1);
            $newApartment->beds = $faker->randomNumber(1);
            $newApartment->bathrooms = $faker->randomNumber(1);
            $newApartment->mq2 = $faker->randomNumber(2);
            $newApartment->slug = Str::slug($newApartment->title, '-');
            $newApartment->save();
        }

        $newApartment = new Apartment();
        $newApartment->is_visible = 0;
        $newApartment->title = $faker->name();
        $newApartment->id_user = 1;
        $newApartment->description = $faker->text();
        $newApartment->cover_image = $faker->imageUrl(250, 250, 'apartments', true);
        $newApartment->latitude = $faker->latitude($min = -90, $max = 90);
        $newApartment->longitude = $faker->longitude($min = -180, $max = 180);
        $newApartment->address = $faker->address();
        $newApartment->rooms = $faker->randomNumber(1);
        $newApartment->beds = $faker->randomNumber(1);
        $newApartment->bathrooms = $faker->randomNumber(1);
        $newApartment->mq2 = $faker->randomNumber(2);
        $newApartment->slug = Str::slug($newApartment->title, '-');
        $newApartment->save();
    }
}
