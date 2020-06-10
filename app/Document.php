<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    // protected $documents = '/documents/';

    protected $fillable = [
        'file_path',
    ];

    public function item()
    {
        return $this->belongsToMany('App\Item');
    }

    public function getFilePathAttribute($document)
    {
        return $this->documents . $document;
    }

    public function getFileUsage()
    {
        $item = Item::where('file_id', $this->id)->first();

        if ($item )
        {
            return "〇";
        }

        return "X";
    }
}
