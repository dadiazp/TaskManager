<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProductRepository;
use App\Repository\InvoiceRepository;

class InvoiceController extends Controller
{
    public function getTotal($invoiceId)
    {
        $repository = new ProductRepository();
        $total = $repository->getTotal($invoiceId)[0]->total;

        if(!isset($total))
        {
            return "La factura con id: " . $invoiceId . " no existe";
        }

        return "El total de la factura con id: " . $invoiceId . " es: " . $total;
    }

    public function getInvoice()
    {
        $repository = new InvoiceRepository();
        $total = $repository->getInvoicesByProductQuantity(100);

        return "Las facturas con cantidad de productos mayores a 100 son: ". $total;
    }

    public function getExpensivesProducts()
    {
        $repository = new ProductRepository();
        $name = $repository->getExpensivesProducts();

        return "Los productos con precio final mayor a 1.000.000 son: " . $name;
    }
}
