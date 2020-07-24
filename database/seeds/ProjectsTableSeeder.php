<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 3; $i++) { 
    		$test_projects[] = [
	    		'name' => Str::random(10),
	    		'user_id' => 1,
	    		'description' => Str::random(20),
	    		'created_at' => now(),
	    		'updated_at' => now()
    		];
    	}
    	DB::table('projects')->insert($test_projects);
    }
}
