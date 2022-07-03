<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */



  public function run(Faker $faker)
  {

    $newUser = new User();
    $newUser->email = 'gigi@gigi.it';
    $newUser->password = bcrypt('password');
    $newUser->name = 'gigi';
    $newUser->surname = 'gigi';
    $newUser->birthday = '1956-09-28';
    $newUser->save();
    
    for ($i = 0; $i < 10; $i++) {
      $newUser = new User();
      $newUser->email = $faker->email();
      $newUser->password = bcrypt($faker->password());
      $newUser->name = $faker->name();
      $newUser->surname = $faker->name();
      $newUser->birthday = $faker->date();

      $newUser->save();
    }
  }
}
