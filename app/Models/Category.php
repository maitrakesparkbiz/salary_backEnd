<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'parent_id'
    ];
    public function category()
    {
        return $this->belongsTo(Expense::class,'category','id');
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'id','parent_id');
    }
}
