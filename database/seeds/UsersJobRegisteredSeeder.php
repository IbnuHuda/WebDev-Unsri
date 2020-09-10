<?php

use Illuminate\Database\Seeder;

class UsersJobRegisteredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UsersJobRegistered::class, 10)->create();
    }
}
