<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\blogB;
use Faker\Generator as Faker;

$factory->define(blogB::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'post_date' => $faker->word,
        'body' => $faker->text,
        'email' => $faker->word,
        'author_gender' => $faker->randomDigitNotNull,
        'post_type' => $faker->word,
        'post_visits' => $faker->randomDigitNotNull,
        'category' => $faker->word,
        'category_short' => $faker->word,
        'is_private' => $faker->word,
        'writer_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
