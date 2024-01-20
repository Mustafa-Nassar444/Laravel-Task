<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'price'];

    public function getNameAttribute()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $attributeName = "name_" . $locale;

        return $this->attributes[$attributeName] ?? null;
    }
}
