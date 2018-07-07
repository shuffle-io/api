<?php

// use App\Entities\User;
// use App\Entities\Example;
// use Illuminate\Database\Seeder;

// class ExamplesTableSeeder extends Seeder
// {
//     public function run()
//     {
//         factory(Example::class, 1)->create()->each(function (Example $ex) {
//             $ex->user()->associate(1);
//         });

//         factory(Example::class, 10)->create()->each(function (Example $ex) {
//             $ex->user()->associate(User::inRandomOrder()->first());
//             $this->command->info("Created Example {$ex->hash} with user {$ex->user->name}");
//         });
//     }
// }
