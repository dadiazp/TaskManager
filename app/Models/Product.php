<?php

namespace App\Models;

use App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'product';
    public $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'name',
        'quantity',
        'price'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
}
