<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Orchids\DemoKit\Models\DemoPost;
use Orchid\Platform\Models\User;

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

$factory->define(DemoPost::class, function (Faker $faker) {
    $lang = app()->getLocale();

    $user = User::inRandomOrder()->first()->id;

    //$type		= 	 $faker->randomElement(["page","demo"]);
    $type = 'demo-screen';

    $status = ['publish'];

    $name = $faker->sentence($nbWords = 6, $variableNbWords = true);

    $post = [
        'user_id' => $user,
        'type'    => $type,
        'status'  => $faker->randomElement($status),
        'content' => [
            $lang => [
                'input'       => $name,
                //'title'       => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'textarea'    => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
                'body'        => $faker->text,
                'markdown'    => $faker->text,
                //'picture'     => $faker->imageUrl($width = 640, $height = 480),
                'picture'     => 'https://loremflickr.com/640/480?lock='.$faker->numberBetween($min = 1, $max = 100000),
                'datetime'    => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)->format('Y-m-d H:i:s'),
                'checkbox'    => $faker->randomElement([0,1]),
                'code'        => $faker->randomHtml(2,3),
                'tags'        => implode(',', $faker->words($nb = 5, $asText = false)),
                'select'      => $faker->randomElement(['index','noindex']),
                'phone'       => $faker->phoneNumber,
            ],
        ],
        'options' => [
            'locale' => [
                'en' => 'true',
            ],
        ],
        'slug'    => Str::slug($name), //'slug' => "demo-page"
    ];

    return $post;
});
