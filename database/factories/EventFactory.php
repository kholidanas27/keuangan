<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'slug' => \Str::slug($faker->sentence()),
        'foto' => $faker->imageUrl('business'),
        'priority_id' => $faker->randomElement($array = array ('1','2','3', '4')),
        'event' => $faker->paragraph(10),
        'author_id' => $faker->randomElement($array = array ('1', '4')),
        'inkubator_id' => 1,
        'publish' => $faker->randomElement($array = array ('0','1')),
        'tgl_mulai' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'waktu_mulai' => $faker->time($format = 'H:i:s', $max = 'now'),
        'tgl_selesai' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'waktu_selesai' => $faker->time($format = 'H:i:s', $max = 'now'),
    ];
});
