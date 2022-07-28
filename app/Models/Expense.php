<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'item_name',
        'price',
        'category',
        'location',
        'spend_on',
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category');
    }
}
