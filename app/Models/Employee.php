<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('assigndate', 'quantity','condition');
        //             ->withTimestamps();
        //return $this->belongsToMany(Product::class);
    }

    // public function productsData()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
