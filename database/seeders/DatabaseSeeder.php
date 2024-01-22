<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call([
			UserSeeder::class,
			CategorySeeder::class,
		]);
		User::Factory(10)->create();
		Author::factory(20)->create();
	}
}
