<?php

use Faker\Generator as Faker;

$factory->define(App\DumyData::class, function (Faker $faker) {
    return [
            'ziro' => str_random(10),
            'one' => str_random(10).'@gmail.com',
            'two' => str_random(5),
            'three' => str_random(15),
            'four' => str_random(20),
            'five' => 'http://www.'.str_random(10).'.com',
    ];
});
