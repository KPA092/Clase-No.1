<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleAndPermissionSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call([
			RoleAndPermissionSeeder::class,
			UserSeeder::class,
			CategorySeeder::class
		]);
		User::Factory(10)->create();
		Author::factory(20)->create();
	}
}
