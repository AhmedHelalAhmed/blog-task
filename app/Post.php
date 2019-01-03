<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title','description','content','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
