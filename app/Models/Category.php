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
    protected $parentColumn = 'parent_id';
    public function category()
    {
        return $this->belongsTo(Expense::class,'category','id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,$this->parentColumn);
    }

    public function children()
    {
        return $this->hasMany(Category::class, $this->parentColumn);
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }
}
