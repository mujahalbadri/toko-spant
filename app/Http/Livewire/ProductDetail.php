<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public $product, $quantity, $size;

    public function mount($id)
    {
        $productDetail = Product::find($id);

        if ($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function masukkanKeranjang()
    {
        $this->validate([
            'quantity' => 'required',
            'size' => 'required|numeric|between:35,45',
        ]);

        // Validasi jika belum login
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        // Menghitung total harga
        $total_price = $this->quantity * $this->product->price;

        // Cek apakah user punya data pesanan utama yang statusnya 0
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // Menyimpan / Update Pesanan Utama
        if (empty($order)) {
            Order::create([
                'user_id' => Auth::user()->id,
                'total_price' => $total_price,
                'status' => 0,
                'unique_code' => mt_rand(100, 999),
            ]);

            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $order->order_code = 'AS-' . $order->id;
            $order->update();
        } else {
            $order->total_price = $order->total_price + $total_price;
            $order->update();
        }

        // Menyimpan pesanan detail
        OrderDetail::create([
            'product_id' => $this->product->id,
            'order_id' => $order->id,
            'quantity' => $this->quantity,
            'size' => $this->size,
            'total_price' => $total_price
        ]);

        $this->emit('masukKeranjang');

        session()->flash('message', 'Berhasil Masuk Keranjang');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}