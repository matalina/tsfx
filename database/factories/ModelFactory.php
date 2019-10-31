<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
    ];
});


/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Room::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'name' => $faker->firstName,
        'description' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Item::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'name' => $faker->firstName,
        'description' => $faker->text(),
        'storable_id' => $faker->sentence,
        'storable_type' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Person::class, static function (Faker\Generator $faker) {
    return [
        'full_name' => $faker->sentence,
        'name' => $faker->firstName,
        'description' => $faker->text(),
        'is_self' => $faker->boolean(),
        'always_on_person' => $faker->sentence,
        'location' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Door::class, static function (Faker\Generator $faker) {
    return [
        'direction' => $faker->sentence,
        'is_locked' => $faker->boolean(),
        'key' => $faker->sentence,
        'password' => bcrypt($faker->password),
        'room_a' => $faker->sentence,
        'room_b' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
