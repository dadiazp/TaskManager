<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductRepository
{

    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function getTotal($invoiceId)
    {
        return $this->product->where('invoice_id', $invoiceId)
                             ->select(DB::raw('SUM(quantity * price) as total'))
                             ->get();
    }

    public function getExpensivesProducts()
    {
        return $this->product->groupBy('id')
                             ->havingRaw(DB::raw('SUM(quantity * price) > 1000000'))
                             ->get("name");
    }

}