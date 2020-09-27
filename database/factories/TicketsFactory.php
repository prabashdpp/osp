<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//save dummy data for tables
$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'ticket_id' => $str_random(10),
        'title' => $faker->unique()->safeEmail,
        'email' => $faker->safeEmail,
        'phone_no' => $faker->phoneNumber,
        'fname' => $faker->name,
        'lname' =>  $faker->name,
        'message' => $faker->text,
        'status' => 0
     ];
});
 