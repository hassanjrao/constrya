<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $appends=['quotation_id'];

    public function getQuotationIdAttribute()
    {
        return 'QT-'.str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function quotationItems()
    {
        return $this->hasMany(QuotationItem::class);
    }
}
