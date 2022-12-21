<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $appends = [
        'total_quantity',
        'image_path',
    ];

    public function units()
    {
        return $this->belongsToMany(Unit::class)->using(Inventory::class);
    }

    public function getTotalQuantityAttribute($val)
    {
        // return $val;
        $total = [];
        foreach ($this->units as $unit){
            $amount = Inventory::where('product_id',$this->id)->where('unit_id',$unit->id)->first()->pluck('amount');
            $tot = $unit->modifier * $amount[0];
            array_push($total,$tot);
        }
        return array_sum($total);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getImagePathAttribute()
    {

        return $this->image->path;
    }

}
