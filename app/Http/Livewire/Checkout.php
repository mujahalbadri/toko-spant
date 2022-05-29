<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $total_price, $nohp, $alamat;

    public function mount()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $this->nohp = Auth::user()->nohp;
        $this->alamat = Auth::user()->alamat;

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (!empty($order)) {
            $this->total_price = $order->total_price + $order->unique_code;
        } else {
            return redirect()->route('home');
        }
    }

    public function checkout()
    {
        $this->validate([
            'nohp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        // SImpan no hp dan alamat ke data user
        $user = User::where('id', Auth::user()->id)->first();
        $user->nohp = $this->nohp;
        $user->alamat = $this->alamat;
        $user->update();

        // Update data order
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order->status = 1;
        $order->update();

        $this->emit('masukKeranjang');

        session()->flash('message', 'Berhasil Checkout');

        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}