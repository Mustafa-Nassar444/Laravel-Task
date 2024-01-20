<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\Item;

class InvoiceController extends Controller
{
    public function create()
    {
        $clients = Client::all();
        $items = Item::all();

        return view('dashboard.invoices.create', compact('clients', 'items'));
    }

    public function store(InvoiceRequest $request)
    {


        // Create the invoice
        $invoice = Invoice::create([
            'client_id' => $request->input('client_id'),
            'date' => $request->input('date'),

        ]);

        // Attach items to the invoice with quantities and total prices
        foreach ($request->input('item_id') as $key => $item_id) {

            $item = Item::find($item_id);
            $quantity = $request->input('quantity.' . $key);

            $invoice->items()->create([
                'item_id' => $item->id,
                'quantity' => $quantity,
                'total_price' => $item->price * $quantity,
            ]);
        }
        $invoice->update(['total_price'=>$invoice->items()->sum('total_price')]);

        // Redirect to a success page or show a success message
        return redirect()->route('invoices.create')->with('success', __('site.added_successfully'));
    }
}
