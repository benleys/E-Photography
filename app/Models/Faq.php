<?php

namespace App\Models;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faq';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'faqcat_id',
        'question',
        'faqcategory',
        'answer',
    ];

    public function faqcategoryKey(){
        return $this->belongsTo(FaqCategory::class, 'faqcat_id', 'id');
    }
}
