<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::insert([
          [
              'name'     => 'Portal User',
              'email'    => 'portal-user@gmail.com',
              'password' => encrypt('12345678'),
          ],
          [
              'name'     => 'Portal User2',
              'email'    => 'portal-user2@gmail.com',
              'password' => encrypt('12345678'),
          ]
        ]);
    }
}
