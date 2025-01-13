<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function material()
    {
        return $this->belongsTo(Material::class)->withDefault();
    }

    public function quotation()
    {
        return $this->belongsTo(Quotation::class)->withDefault();
    }


}
