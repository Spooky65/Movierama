<?php namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class MovieRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Movie';
    }

}
