<?php

use Illuminate\Database\Seeder;
use App\User as User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('users')->get()->count() == 0)
        {
            echo "\nAdmin User created with username : admin@laravel.com and password : admin\n";
            factory(User::class) -> create([
                'name'     => 'admin',
                'email'    => "admin@laravel.com",
                'password' => Hash ::make('admin'),
            ]);
        }
        else
        {
            echo "\nAdmin created before then 5 normal user will be created\n";
            factory(User::class, 5)->create();
        }
    }
}
