<?php


namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin/categories/index', ['categories' => $categories]);
    }

    public function create(){
        return view('admin/categories/create');
    }

    public function addNew(CategoryRequest $request){
        $ca = new  Category($request->all());
        $ca->save();
        return redirect(route("categories.index"));
    }

    public function edit($id){
        $ca = Category::find($id);
        return view('admin/categories/edit', ['ca'=>$ca]);
    }

    public function update($id, CategoryRequest $request) {
        $ca =  Category::find($id);
        $ca->name = $request->name;
        $ca->save();
        return redirect(route("categories.index"));
    }

    public function delete($id): RedirectResponse
    {
        try {
            $ca = Category::find($id);
            $ca->delete();
            return redirect()->back()->with('success', 'Delete success');
        }catch (\Exception $e){
            Log::error($e);
        }
    }
}
