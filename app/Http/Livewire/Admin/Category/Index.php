<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File; 

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $categories= Category::orderby('id','DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }

    //category deletion 
    public $category_id;
    public function deleteIt($id){
        $this->category_id = $id;
    }
  
    public function delete()
    {
        $category=Category::findOrFail($this->category_id);
        $img='uploads/category/'.$category->image;
        if(File::exists($img)){                
            File::delete($img);
        }
        $category->delete();
        session()->flash('message', 'Category Deleted Successfully');
    }
}
