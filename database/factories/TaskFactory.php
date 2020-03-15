<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Task;
use App\Model\User;
use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence,
        'description'=> $faker->paragraph,
        'deadline_at'=> $faker->dateTime,
        'remarks'=> $faker->text,
        'user_id'=> factory(User::class),
        'category_id'=> factory(Category::class),
    ];
});
