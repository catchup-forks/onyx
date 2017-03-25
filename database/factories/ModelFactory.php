<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, function(){
    static $parentId;
    $category = [
        'parent_id' => (($parentId)? $parentId : null),
        'type' => 2,
        'position' => 0
    ];
    if(!$parentId)
        $parentId = 1;
    else
        $parentId += 1;
    return $category;
});

$factory->define(App\Models\CategoryLocale::class, function(Faker\Generator $faker){
    static $categoryId;
    if(!$categoryId)
        $categoryId = 1;
    else
        $categoryId += 1;
    $categoryLocale = [
        'category_id' => $categoryId,
        'locale' => 'en',
        'name' => $faker->sentence(2),
        'description' => $faker->sentence(8)
    ];
    return $categoryLocale;
});
