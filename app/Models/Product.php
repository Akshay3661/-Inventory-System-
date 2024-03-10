<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class)
                    ->withPivot('assigndate', 'quantity' ,'condition');
                    //->withTimestamps();
        //return $this->belongsToMany(Employee::class);
    }

    // public function employeesData()
    // {
    //     return $this->belongsToMany(Employee::class);
    // }

}
