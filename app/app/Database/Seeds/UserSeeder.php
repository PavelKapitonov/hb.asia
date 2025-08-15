<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
	public function run()
	{
		$user_object = new UserModel();

		$user_object->insertBatch([
			[
				"name" => "Pavel",
				"email" => "nolimit314@gmail.com",
				"phone_no" => "7899654125",
				"role" => "admin",
				"password" => password_hash("arafaz22", PASSWORD_DEFAULT)
			],
			[
				"name" => "Healingbowlschool",
				"email" => "healingbowlschool@gmail.com",
				"phone_no" => "7899654125",
				"role" => "admin",
				"password" => password_hash("healing22&", PASSWORD_DEFAULT)
			],			
		]);
	}
}