<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $suRole = new Role();
		$suRole->name         = 'su';
		$suRole->display_name = 'Super User'; // optional
		$suRole->description  = 'Super User'; // optional
		$suRole->save();

		$userRole = new Role();
		$userRole->name         = 'admin';
		$userRole->display_name = 'Admin'; // optional
		$userRole->description  = 'Admin'; // optional
		$userRole->save();


		$su = new User();
		$su->name = 'Super admin';
		$su->email = 'su@gmail.com';
		$su->password = bcrypt('rahasia');
		$su->foto = 'default.png';
		$su->save();
		$su->attachRole($suRole);

		$sample = new User();
		$sample->name = 'Sample Admin';
		$sample->email = 'admin@gmail.com';
		$sample->password = bcrypt('rahasia');
		$sample->foto = 'default.png';
		$sample->save();
		$sample->attachRole($userRole);

	}
}
