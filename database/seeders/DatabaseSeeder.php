<?php

use Database\Seeders\KelasSeeder;
use Database\Seeders\LoginSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //  $this->call(KelasSeeder::class);
    
     $this->call(LoginSeeder::class);

    }
}

?>