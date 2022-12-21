<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class Inventory extends Pivot
{
    use HasFactory;
    protected $table = 'product_unit';
    protected $fillable = ['product_id','unit_id','amount'];
    // public function product()
    // {
    //     return $this->belongsTo(Product::class,'product_id');
    // }
    // public function unit()
    // {
    //     return $this->belongsTo(Unit::class,'unit_id');
    // }
}
