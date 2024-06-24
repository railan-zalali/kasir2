<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::with('details.product')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('details.product'); // Atau $transaction = Transaction::with('details.product')->find($transaction->id);
        return view('transactions.show', compact('transaction'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create(['total' => 0]);
        $total = 0;

        foreach ($request->products as $productData) {
            $product = Product::find($productData['id']);
            $quantity = $productData['quantity'];
            $price = $product->price;

            if ($product->quantity < $quantity) {
                return redirect()->back()->with('error', 'Stock tidak mencukupi untuk produk ' . $product->name);
            }

            $total += $price * $quantity;

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
            ]);

            $product->decrement('quantity', $quantity);
        }

        $transaction->update(['total' => $total]);

        return redirect()->route('transactions.index')->with('success', 'Transaction processed successfully.');
    }
    public function getProductByBarcode($barcode)
    {
        $product = Product::where('barcode', $barcode)->first();

        if ($product) {
            return response()->json(['product' => $product]);
        } else {
            return response()->json(['product' => null], 404);
        }
    }
}
