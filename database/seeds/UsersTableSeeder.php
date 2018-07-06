<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'name' => env('ADMIN_USERNAME', 'Admin'),
            'email' => env('ADMIN_EMAIL', 'admin@example.com'),
            'password' => bcrypt(env('ADMIN_PASSWORD', 'password'))
        ])->each(function ($u) {
            $this->command->info('Created User '. $u->name);
            $u->attachRole('super-administrator');
            $this->command->info('Attached Role super-administrator to '. $u->name);
        });
        
        factory(User::class, 10)->create()->each(function ($u) {
            $this->command->info('Created User '. $u->name);
        });
    }
}
