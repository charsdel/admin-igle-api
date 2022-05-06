<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       

        //este es el que uso para llenar las tablas
        /*
        \App\Models\User::factory(10)->create();

        
        \App\Models\Sede::factory(5)->create()->each(function ($sede) {

            $net = \App\Models\Net::factory(2)->make();
            $sede->nets()->saveMany($net);

            $net->each(function ($red) {
                $home = \App\Models\Home::factory(2)->make();

                //echo ($home);
                $red->homes()->saveMany($home);

                $home->each(function ($home) {
                    $member = \App\Models\Member::factory(5)->make();
    
                    $home->members()->saveMany($member);
    
                });
            });
        });*/

        //\App\Models\Member::factory(100)->make();

        // \App\Models\Sede::factory(5)->create();
        //\App\Models\Net::factory(5)->create();
        //\App\Models\Homes::factory(5)->create();
        

    }
}
