<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cat_id',
        'title',
        'image',
        'category',
        'description',
        'spotlight',
    ];

    public function categoryKey(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
