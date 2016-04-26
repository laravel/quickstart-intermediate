<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
    ];
});

$factory->define(App\EdInfo::class, function(Faker\Generator $faker) {
    return [
        'ed_id' => 'ed_' . ($faker->randomNumber() % 10),
        'pmt_id' => str_random(10),
        'operator' => $faker->name,
        'test_time' => $faker->dateTimeBetween('-2 years', 'now'),
        'raw_data_path' => str_random(20),
        'test_ambient_path' => str_random(20),
        'detection_efficiency' => $faker->randomFloat(null, 10, 100),
        'detail_detection_efficiency_path' => str_random(20),
        'system_resolution' => $faker->randomFloat(null, 90, 100),
        'ed_tts' => $faker->randomFloat(null, 20, 200),
        'energy_resolution' => $faker->randomFloat(null, 90, 100),
        'relative_energy_resolution' => $faker->randomFloat(null, 80, 120),
        'single_muon_charge' => $faker->randomFloat(null, 70, 150),
    ];
});

