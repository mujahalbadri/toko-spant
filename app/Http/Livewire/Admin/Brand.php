<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Brand as ModelsBrand;
use Illuminate\Support\Facades\Storage;

class Brand extends Component
{
    use WithFileUploads;

    public $name_brand, $image_brand, $image_preview;
    public $showEditModal = false;
    public $brand_id = '';

    public function add()
    {
        $this->reset();

        $this->showEditModal = false;
    }

    public function store()
    {
        $this->validate([
            'name_brand' => 'required',
            'image_brand' => 'required|image',
        ]);

        ModelsBrand::create([
            'name' => $this->name_brand,
            'image' => $this->image_brand->store('brand/image/')
        ]);

        session()->flash('message', 'Data Brand berhasil disimpan');

        $this->dispatchBrowserEvent('closeModal');
    }


    public function edit($id)
    {
        $this->reset();

        $this->showEditModal = true;

        $this->brand_id = $id;

        $brand = ModelsBrand::where('id', $id)->first();

        $this->name_brand = $brand->name;
        $this->image_preview = $brand->image;
    }

    public function update()
    {
        $this->validate([
            'name_brand' => 'required',
            'image_brand' => 'nullable|sometimes|image',
        ]);

        $brand = ModelsBrand::find($this->brand_id);
        $old_image = $brand->image;
        Storage::delete($old_image);

        $brand->update([
            'name' => $this->name_brand,
            'image' => $this->image_brand->store('brand/image/'),
        ]);

        session()->flash('message', 'Data Brand berhasil diubah');

        $this->dispatchBrowserEvent('closeModal');
    }

    public function delete($id)
    {
        $this->brand_id = $id;
    }

    public function destroy()
    {
        $brand = ModelsBrand::find($this->brand_id);
        $image = $brand->image;
        Storage::delete($image);

        $brand->delete();

        session()->flash('message', 'Data Brand berhasil dihapus');
    }

    public function render()
    {
        $brands = ModelsBrand::get();
        return view('livewire.admin.brand', [
            'brands' => $brands,
        ]);
    }
}