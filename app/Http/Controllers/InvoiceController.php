<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{

    public function generateInvoice( $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.order.invoice',$data);
        $todayDate = Carbon::now()->format('d-m-y');
        return $pdf->setPaper('a4')->download('invoice'.$order->id.'-'.$todayDate.'.pdf');

    }

}
