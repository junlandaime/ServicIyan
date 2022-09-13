<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategory;
use Illuminate\Database\Seeder;
use Database\Seeders\CityTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\DistrictTableSeeder;
use Database\Seeders\ProvinceTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // $this->call(ProvinceTableSeeder::class);
        // $this->call(CityTableSeeder::class);
        // $this->call(DistrictTableSeeder::class);
        // $this->call(UsersTableSeeder::class);

        Kategory::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Kategory::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Kategory::create([
            'name' => 'Astronomy',
            'slug' => 'astronomy'
        ]);

        Kategory::create([
            'name' => 'Islam',
            'slug' => 'islam'
        ]);

        Kategory::create([
            'name' => 'Movie',
            'slug' => 'movie'
        ]);

        Kategory::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(40)->create();
    }
}
