<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Distributor;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category',
        'description',
        'image',
        'id_distributor'
    ];

    public function distributor()
{
    return $this->belongsTo(Distributor::class, 'id_distributor');
}

    public function flashSale()
{
    return $this->hasOne(FlashSale::class);
}
}