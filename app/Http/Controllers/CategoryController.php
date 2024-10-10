<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at')->get();

        return view('category.index',[
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255,'
        ]);

        if($validator->fails()){
            return redirect()->route('category.create')->withInput()->withErrors($validator);
        }

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully.');

    }
}
