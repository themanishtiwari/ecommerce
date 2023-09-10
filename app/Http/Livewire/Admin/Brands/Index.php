<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brands;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $name, $slug, $status;
    public function rules(){
        return[
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'required|in:0,1',
        ];
    }

    public function resetInput(){
        $this->name=NULL;
        $this->slug=NULL;
        $this->status=NULL;
    }
    //for livewire form testing
    // public function addBrand(){
    //     dump($this->name.$this->slug);
    // }
    public function addBrand(){
        $validatedData = $this->validate();

        Brands::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status
        ]);
        //also use to create new record
       // Brands::create($validatedData);
        session()->flash('message','Brands Added Successfully');
        $this->dispatchBrowserEvent('close-model');
        $this->resetInput();

     }

     public $edit_id;
     function editBrand(int $id){
        $this->edit_id=$id;
        $brand=Brands::findOrFail($id);
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
    }

    function updateBrand(){
        $validatedData = $this->validate();

        Brands::findOrFail($this->edit_id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status
        ]);
        //also use to create new record
       // Brands::create($validatedData);
        session()->flash('message','Brands Updated Successfully');
        $this->dispatchBrowserEvent('close-model');
        $this->resetInput();

    }

     public $brand_id;
     public function deleteIt($id){
        $this->brand_id = $id;
    }
  
    public function delete()
    {
        $brand=Brands::findOrFail($this->brand_id);
        $brand->delete();
        session()->flash('message', 'Category Deleted Successfully');
    }

    public function render()
    {
        $brands= Brands::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brands.index', ['brands'=>$brands])->extends('layouts.admin');
    }
}
