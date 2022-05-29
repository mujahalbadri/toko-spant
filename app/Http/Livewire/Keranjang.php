<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Keranjang extends Component
{
    protected $order;
    protected $order_details = [];
    public $destroyId = '';

    public function destroyId($id)
    {
        $this->destroyId = $id;
    }

    public function destroy()
    {
        $order_detail = OrderDetail::find($this->destroyId);
        if (!empty($order_detail)) {
            $order = Order::where('id', $order_detail->order_id)->first();
            $total_order_detail = OrderDetail::where('order_id', $order->id)->count();
            if ($total_order_detail == 1) {
                $order->delete();
            } else {
                $order->total_price = $order->total_price - $order_detail->total_price;
                $order->update();
            }

            $order_detail->delete();

            $this->emit('masukKeranjang');

            session()->flash('message', 'Pesanan dihapus');
        }
    }

    public function render()
    {
        if (Auth::user()) {
            $this->order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($this->order) {
                $this->order_details = OrderDetail::where('order_id', $this->order->id)->get();
            }
        }

        return view('livewire.keranjang', [
            'order' => $this->order,
            'order_details' => $this->order_details
        ]);
    }
}