<?php namespace App\Models;

use App\Traits\BaseModelTrait;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use BaseModelTrait;

    /**
     * @var array
     */
    protected $fillable = ['id', 'adult', 'original_title', 'popularity', 'video'];
/*
    public function user()
    {
        return $this->belongsTo('App\User');
    }
*/
}
