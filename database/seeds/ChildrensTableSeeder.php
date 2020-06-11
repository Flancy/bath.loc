<?php

use Illuminate\Database\Seeder;
use App\Models\Children;

class ChildrensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Children::class, 20)->create();
    }
}
