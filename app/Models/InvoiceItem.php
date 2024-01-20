<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_id', 'item_id', 'quantity', 'total_price'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    /*public function items()
    {
        return $this->hasMany(Item::class);
    }*/
}
