<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use App\Model\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=> Str::random(5),
        'user_id'=>factory(User::class),
    ];
});
