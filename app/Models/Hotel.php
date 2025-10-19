<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    /**
     * يتم تعيين اسم الجدول يدوياً لضمان التوافق.
     * @var string
     */
    protected $table = 'hotels';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'rating',
    ];

    // إيقاف الطوابع الزمنية (timestamps) إذا لم تكن موجودة في جدولك
    public $timestamps = false;
}
