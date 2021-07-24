<?php

namespace App\Repository;
use App\Models\Invoice;

class InvoiceRepository
{

    protected $invoice;

    public function __construct()
    {
        $this->invoice = new Invoice();
    }

    public function getById($id)
    {
        return $this->invoice->findOrFail($id);
    }

    public function getInvoicesByProductQuantity($quantity)
    {
        return $this->invoice->join('product', 'invoice.id', 'product.invoice_id')
                             ->where('product.quantity', '>', $quantity)
                             ->select('invoice.id')
                             ->distinct()
                             ->get();
    }

    public function updateTotal($invoiceId, $total)
    {
        return $this->invoice->where('id', $invoiceId)->update(['total' => $total]);
    }

}