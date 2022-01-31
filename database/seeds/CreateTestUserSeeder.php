<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateTestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->setColumn('name', 'Юзер');
        $user->setColumn('email', 'user@user.loc');
        $user->setColumn('password', bcrypt('user'));
        $user->save();
    }
}
