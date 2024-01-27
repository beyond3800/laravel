<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function scopeFilter($query,$filters)
    {
        // dd($filters);

        if($filters ?? false)
        {
            $query->where('category','like','%' . request('category') . '%');
        }

    }
    protected $fillable = [
        'product_name',
        'price',
        'category',
        'description',
        'image',
        'admin',
        'short_desc',
    ];


}
