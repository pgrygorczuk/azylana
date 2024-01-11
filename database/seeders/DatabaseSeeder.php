<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Building;
use App\Models\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
			'email' => 'admin@example.com',
			'password' => Hash::make('adminadmin'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $resources = new Resource();
        $resources = $resources->replicate()->fill([
            'wood' => 0, 'clay' => 0, 'ore' => 0, 'stone' => 0, 'food' => 0 ]);
        $resources->save();
		$resources = $resources->replicate()->fill([
            'wood' => 1, 'clay' => 1, 'ore' => 0, 'stone' => 1, 'food' => 0 ]);
        $resources->save();
		$resources = $resources->replicate()->fill([
            'wood' => 1, 'clay' => 1, 'ore' => 0, 'stone' => 0, 'food' => 0 ]);
        $resources->save();
		$resources = $resources->replicate()->fill([
            'wood' => 1, 'clay' => 0, 'ore' => 0, 'stone' => 0, 'food' => 0 ]);
        $resources->save();
		$resources = $resources->replicate()->fill([
            'wood' => 1, 'clay' => 0, 'ore' => 0, 'stone' => 0, 'food' => 1 ]);
        $resources->save();

		$b = new Building();
        $b->replicate()->fill([
            'resource_id' => 1, 'name' => 'Free slot', 'max_level' => 0 ])->save();
		$b->replicate()->fill([
            'resource_id' => 2, 'name' => 'Town hall', 'description' =>
            'The town hall is the central building of the city. It is where the authorities make decisions about development.',
			'image1' => 'town-hall1.jpg', 'max_level' => 20 ])->save();
		$b->replicate()->fill([
            'resource_id' => 3, 'name' => 'Houses',
			'image1' => 'houses1.jpg', 'max_level' => 100 ])->save();
		$b->replicate()->fill([
            'resource_id' => 4, 'name' => 'Woodcutters',
			'image1' => 'woodcutters1.jpg', 'max_level' => 5 ])->save();
		$b->replicate()->fill([
            'resource_id' => 5, 'name' => 'Farm',
			'image1' => 'farm1.jpg', 'max_level' => 20 ])->save();
    }
}
