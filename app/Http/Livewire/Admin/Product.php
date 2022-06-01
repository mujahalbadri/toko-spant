<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    use WithFileUploads;

    public $name_product, $brand_product, $price_product, $color_product, $is_ready, $description, $image_product, $image_preview;
    public $showEditModal = false;
    public $product_id = '';

    public function add()
    {
        $this->reset();

        $this->showEditModal = false;
    }

    public function store()
    {
        $this->validate([
            'name_product' => 'required',
            'brand_product' => 'required',
            'price_product' => 'required',
            'color_product' => 'required',
            'is_ready' => 'required',
            'description' => 'required',
            'image_product' => 'required|image'
        ]);

        ModelsProduct::create([
            'name' => $this->name_product,
            'brand_id' => $this->brand_product,
            'price' => $this->price_product,
            'color' => $this->color_product,
            'is_ready' => $this->is_ready,
            'description' => $this->description,
            'image' => $this->image_product->store('product/image/')
        ]);

        session()->flash('message', 'Data Product berhasil disimpan');

        $this->dispatchBrowserEvent('closeModal');
    }

    public function edit($id)
    {
        $this->reset();

        $this->showEditModal = true;

        $this->product_id = $id;

        $product = ModelsProduct::where('id', $id)->first();

        $this->name_product = $product->name;
        $this->brand_product = $product->brand_id;
        $this->price_product = $product->price;
        $this->color_product = $product->color;
        $this->is_ready = $product->is_ready;
        $this->description = $product->description;
        $this->image_preview = $product->image;
    }

    public function update()
    {
        $this->validate([
            'name_product' => 'required',
            'brand_product' => 'required',
            'price_product' => 'required',
            'color_product' => 'required',
            'is_ready' => 'required',
            'description' => 'required',
            'image_product' => 'required|image'
        ]);

        $product = ModelsProduct::find($this->product_id);
        $old_image = $product->image;
        Storage::delete($old_image);

        $product->update([
            'name' => $this->name_product,
            'brand_id' => $this->brand_product,
            'price' => $this->price_product,
            'color' => $this->color_product,
            'is_ready' => $this->is_ready,
            'description' => $this->description,
            'image' => $this->image_product->store('product/image/'),
        ]);

        session()->flash('message', 'Data Product berhasil diubah');

        $this->dispatchBrowserEvent('closeModal');
    }

    public function delete($id)
    {
        $this->product_id = $id;
    }

    public function destroy()
    {
        $product = ModelsProduct::find($this->product_id);
        $image = $product->image;
        Storage::delete($image);

        $product->delete();

        session()->flash('message', 'Data Product berhasil dihapus');
    }

    public function render()
    {
        $products = ModelsProduct::paginate(8);
        $brands = Brand::get();
        return view('livewire.admin.product', [
            'products' => $products,
            'brands' => $brands
        ]);
    }
}