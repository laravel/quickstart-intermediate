<?php

use Illuminate\Database\Seeder;

class edInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EdInfo::class, 200)->create()->each(function($u) {
            $u->save();
        });
    }
}
