<?php

use Illuminate\Database\Seeder;
use App\Models\Trainer;

class TrainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Trainer::class, 5)->create();
    }
}
