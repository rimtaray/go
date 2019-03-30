<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new \App\TbUsers();
        $user->u_idcard = '3587458965214';
        $user->u_name = 'rimtaray';
        $user->u_email = 'rimtaray@gmail.com';
        $user->u_pass = Hash::make('123456');
        $user->u_status = '1';
        $user->save();
    }
}
