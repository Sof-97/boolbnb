<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\View;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $newView = new View();

            $newView-> ip_address = $faker->ipv4();
            $newView-> id_apartment = $i + 1;
            

            $newView->save();
        }
    }
}
