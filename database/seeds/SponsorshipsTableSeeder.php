<?php

use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newSponsorship = new Sponsorship();
        $newSponsorship->name = "Bronze";
        $newSponsorship->price = 2.99;
        $newSponsorship->duration = "24:00:00";

        $newSponsorship->save();

        $newSponsorship = new Sponsorship();
        $newSponsorship->name = "Silver";
        $newSponsorship->price = 5.99;
        $newSponsorship->duration = "72:00:00";
         
        $newSponsorship->save();

        $newSponsorship = new Sponsorship();
        $newSponsorship->name = "Gold";
        $newSponsorship->price = 9.99;
        $newSponsorship->duration = "144:00:00";

        $newSponsorship->save();
    }
}
