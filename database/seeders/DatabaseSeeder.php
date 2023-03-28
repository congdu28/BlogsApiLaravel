<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     CustomerSeeder::class,
        // ]);
        
        // $array=[];
        // for($i=0;$i<10;$i++){
        //     array_push($array,[
        //         "name"=>"Cong Du",
        //         "email"=>"congdu".($i+1)."@gmail.com",
        //         "password"=>Hash::make('12345678')
        //     ],
        //     );
        // }
        // DB::table("users")->insert(
        //     $array
        // );
    }
}
