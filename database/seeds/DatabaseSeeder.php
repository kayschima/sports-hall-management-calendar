<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory( App\User::class, 50 )->create();

        \App\User::find( 1 )->update( [
            'is_admin'          => 1,
            'email_verified_at' => now()
        ] );
    }
}
