<?php

use Illuminate\Database\Seeder;
use App\Todo;
class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Todo',5)->create();
    }
}
