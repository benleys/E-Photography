<?php

namespace App\Models;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqCategory extends Model
{
    use HasFactory;

    protected $table = 'faqcategories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function faqKey()
    {
        return $this->hasMany(Faq::class);
    }
}
