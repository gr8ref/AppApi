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
        //
        $user = new User;
                    $user->name = "Refik";
                    $user->email = "refik@umisoft.ba";
                    $user->password = bcrypt('secret');
                    $user->is_admin = true;
                    $user->save();
    }
}
