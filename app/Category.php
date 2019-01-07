<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function path()
    {
        return '/categories/'.$this->id;
    }

}
