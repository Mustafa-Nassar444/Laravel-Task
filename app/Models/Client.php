<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar', 'name_en'];

    public function getNameAttribute()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $attributeName = "name_" . $locale;

        return $this->attributes[$attributeName] ?? null;
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
