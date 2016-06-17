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
        'name'      => $faker->name,
        'email'     => $faker->safeEmail,
        'username'  => $faker->userName,
        'password'  => bcrypt('password'),
        'slug'      => str_slug($faker->userName),
        'avatar'    => substr($faker->image($dir = public_path('avatars'), $width = 150, $height= 150), 38),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Piece::class,  function (Faker\Generator $faker){
    $sizes = [0 => [275,150], 1 => [150,275]];
    $res = $sizes[rand(0,1)];
    $usersMax = \App\User::count();
    $faker->seed(rand(11111,99999));
    $image_path = substr($faker->image($dir = public_path('images'), $width = 600, $height=400), 38);
    
    $thumbnail_path = substr($faker->image($dir = public_path('thumbnails'), $width = $res[0], $height= $res[1]), 38);
    return [
        'title' => ucwords($faker->words(3, true)),
        'comment' => $faker->paragraphs(2,true),
        'image_path' => $image_path,
        'thumbnail_path' => $thumbnail_path,
        'published_at' => \Carbon\Carbon::now(),
        'user_id' => rand(1, $usersMax),
    ];
});

$factory->define(App\Opus::class,  function (Faker\Generator $faker){
    $sizes = [0 => [275,150], 1 => [150,275]];
    $res = $sizes[rand(0,1)];
    $theme = 'abstract';
    $usersMax = \App\User::count();
    $faker->seed(rand(11111,99999));
    $image_path = substr($faker->image($dir = public_path('images'), $width = 600, $height=400,$theme), 38);

    $thumbnail_path = substr($faker->image($dir = public_path('thumbnails'), $width = $res[0], $height=$res[1], $theme), 38);
    return [
        'title' => ucwords($faker->words(3, true)),
        'comment' => $faker->paragraphs(2,true),
        'image_path' => $image_path,
        'thumbnail_path' => $thumbnail_path,
        'published_at' => \Carbon\Carbon::now(),
        'user_id' => rand(1, $usersMax),
    ];
});

$factory->define(App\Gallery::class, function (Faker\Generator $faker){
    return [
        'name' => ucwords($faker->words(3, true)),
        'description' => $faker->sentence,
        'main_gallery' => 0,
    ] ;
});

$factory->define(App\Comment::class, function (Faker\Generator $faker){
   return [
       'body' => $faker->paragraph,
   ];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker){
    return [
        'biography' => $faker->paragraphs(2, true),
    ] ;
});

$factory->define(App\Notification::class, function (Faker\Generator $faker){
    $handles = ['opus','comment'];
    $opusCount = \App\Opus::count();
    $randomOpus = rand(1,$opusCount);
    $commentCount = \App\Comment::count();
    $randomComment = rand(1, $commentCount);
    $noteStore = [
        ['handle'=>$handles[0], 'opus_id'=>rand(1,$randomOpus), 'content'=>\App\Opus::find($randomOpus)->first()->title, 'read'=>0],
        ['handle'=>$handles[1], 'comment_id'=>rand(1,$randomComment), 'content'=>\App\Comment::find($randomComment)->body, 'read'=>0]
    ];
    return $noteStore[rand(0,1)];
});

$factory->define(App\Feature::class, function (Faker\Generator $faker){
    $galleryMax = \App\Gallery::count();
    $pieceMax = \App\Piece::count();
   return [
        'gallery_id' => rand(1, $galleryMax),
        'piece_id' => rand(1, $pieceMax)
   ] ;
});

$factory->define(\App\Tag::class, function (Faker\Generator $faker){
   return [
       'name' => $faker->unique()->word,
   ]; 
});

$factory->define(\App\Watch::class, function(Faker\Generator $faker){
   return [
       'watch_comments' => true,
       'watch_opus'     => true,
       'watch_activity' => true
   ];
});

