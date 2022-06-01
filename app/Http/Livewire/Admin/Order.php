<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order as ModelsOrder;
use App\Models\OrderDetail;
use Livewire\Component;

class Order extends Component
{
    public $order_details, $order_date, $order_user, $status, $total_price, $unique_code;
    public $order_code = '';
    public $order_id = '';

    public function show($id)
    {
        $this->order_id = $id;

        $order = ModelsOrder::where('id', $id)->first();
        $this->order_code = $order->order_code;
        $this->order_date = date('d-m-Y', strtotime($order->created_at));
        $this->order_user = $order->user->name;
        $this->status = $order->status;
        $this->total_price = $order->total_price;
        $this->unique_code = $order->unique_code;

        $get_order_details = OrderDetail::where('order_id', $this->order_id)->get();
        $this->order_details = $get_order_details;
    }

    public function edit($id)
    {
        $this->reset();

        $this->order_id = $id;

        $order = ModelsOrder::where('id', $id)->first();
        $this->status = $order->status;
    }

    public function update()
    {
        $this->validate([
            'status' => 'required',
        ]);

        $order = ModelsOrder::find($this->order_id);

        $order->update([
            'status' => $this->status,
        ]);

        session()->flash('message', 'Data Order berhasil diubah');

        $this->dispatchBrowserEvent('closeModal');
    }

    public function delete($id)
    {
        $this->order_id = $id;
    }

    public function destroy()
    {
        $order = ModelsOrder::find($this->order_id);
        $order->delete();

        session()->flash('message', 'Data Order berhasil dihapus');
    }

    public function render()
    {
        $orders = ModelsOrder::get();
        return view('livewire.admin.order', [
            'orders' => $orders,
        ]);
    }
}