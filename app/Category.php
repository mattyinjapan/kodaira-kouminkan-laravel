<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'order',
        'url',
    ];

    public function item()
    {
        return $this->hasMany('App\Item');
    }

    public function subcategory()
    {
        return $this->hasMany('App/Subcategory');
    }
}
