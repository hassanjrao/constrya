<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calculator extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $appends=['short_description'];

    public function getShortDescriptionAttribute()
    {
        // remove image tags
        $string = strip_tags($this->description);

        return $string ? substr($string, 0, 50).'.....' : '';


    }
}
