<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable=['client_id','date','total_price'];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function items(){
        return $this->hasMany(InvoiceItem::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->items->sum('total_price');
    }
}
