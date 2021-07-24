<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $table = 'invoice';
    public $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'date',
        'user_id',
        'seller_id',
        'type',
        'total'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);    
    }
}
