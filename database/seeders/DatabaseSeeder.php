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
        $resources = $resources->replicate()->fill([ # Unlock empty slot.
            'wood' => 10, 'clay' => 10, 'ore' => 10, 'stone' => 10, 'food' => 0,
            'wood_inc' => 1.66, 'clay_inc' => 1.66, 'ore_inc' => 1.66,
            'stone_inc' => 1.66, 'food_inc' => 1.66, 'type' => 'b' ]);
        $resources->save();
		$resources = $resources->replicate()->fill([ # Town hall.
            'wood' => 10, 'clay' => 3, 'ore' => 0, 'stone' => 10, 'food' => 0,
			'wood_inc' => 1.33, 'clay_inc' => 1.33, 'ore_inc' => 1.33,
            'stone_inc' => 1.33, 'food_inc' => 1.33, 'type' => 'b' ]);
        $resources->save();
		$resources = $resources->replicate()->fill([ # Houses
            'wood' => 10, 'clay' => 10, 'ore' => 0, 'stone' => 3, 'food' => 0,
			'wood_inc' => 1.33, 'clay_inc' => 1.33, 'ore_inc' => 1.33,
            'stone_inc' => 1.33, 'food_inc' => 1.33, 'type' => 'b' ]);
        $resources->save();
		$resources = $resources->replicate()->fill([ # Woodcutters
            'wood' => 6, 'clay' => 3, 'ore' => 0, 'stone' => 0, 'food' => 0,
			'wood_inc' => 1.33, 'clay_inc' => 1.33, 'ore_inc' => 1.33,
            'stone_inc' => 1.33, 'food_inc' => 1.33, 'type' => 'b' ]);
        $resources->save();
		$resources = $resources->replicate()->fill([ # Farm
            'wood' => 12, 'clay' => 8, 'ore' => 3, 'stone' => 3, 'food' => 3,
			'wood_inc' => 1.33, 'clay_inc' => 1.33, 'ore_inc' => 1.33,
            'stone_inc' => 1.33, 'food_inc' => 1.33, 'type' => 'b' ]);
        $resources->save();

		$b = new Building();
        $b->replicate()->fill([
            'resource_id' => 1, 'name' => 'Construction field', 'max_level' => 0, 'description' =>
            "It'a a free construction field. You can select a new building to construct.", ])->save();
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
