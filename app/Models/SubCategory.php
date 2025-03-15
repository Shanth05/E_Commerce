<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories'; 
    
    protected $fillable = [
        'category_id',
        'subcategory_name',
    ];
    
    function category(){
        return $this->belongsTo(Category::class);
    }
}
