<?php

use App\Models\Apartment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\View;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments  = Apartment::all();
        $period = new CarbonPeriod('2022-01-01', 'today');
        foreach ($apartments as $apartment) {
            for ($i = 0; $i < rand(20, 100); $i++) {
                foreach ($period as $key => $value) {
                    $view = new View();
                    $value->addHours(rand(3, 7));
                    $view->ip_address = $faker->ipv4();
                    $view->apartment_id  = $apartment->id;
                    $view->setCreatedAt($value);
                    $view->save();
                }
            }
        }
    }
}
