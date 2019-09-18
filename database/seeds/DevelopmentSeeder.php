<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\Route;
use App\Models\Role;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Add migration code for the development environment.
        $json = file_get_contents('/var/www/lesk/database/movie_ids_09_16_2019.json');
        $json_Object = json_decode($json);
        foreach ($json_Object as $moviejson)
        {
            $movie = Movie::create([
                'adult'            => $moviejson->adult,
                'id'               => $moviejson->id,
                'original_title'   => $moviejson->original_title,
                'popularity'       => $moviejson->popularity,
                'video'            => $moviejson->video,

            ]);
            //$movie->save();
        }
        
        
        

    }
}
