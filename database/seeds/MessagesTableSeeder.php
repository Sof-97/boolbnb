<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newMessage = new Message();
            $newMessage->apartment_id = $i + 1;
            $newMessage->text = $faker->text();
            $newMessage->email_sender = $faker->email();
            $newMessage->name = $faker->title();
            $newMessage->save();
        }
    }
}
