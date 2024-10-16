<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DiseaseController extends Controller
{
    public function index()
    {   
        $diseases = Disease::with('category')->orderBy('created_at')->get();

        return view('disease.index',[
            'diseases' => $diseases
        ]);
    } 
     
    public function create(){
        $categories = Category::orderBy('created_at')->get();
        
        return view('disease.create',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];

        if(!empty($request->image)){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('disease.create')->withInput()->withErrors($validator);
        }

        $disease = new Disease();
        $disease->name = $request->name;
        $disease->description = $request->description;
        $disease->status = $request->status;
        $disease->category_id = $request->category_id;
        $disease->save();

        if(!empty($request->image)){
            File::delete(public_path('uploads/disease'.$disease->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/disease'), $imageName);

            $disease->image = $imageName;
            $disease->save();

        }

        return redirect()->route('disease.create')->with('success', 'Disease post created successfully');
    }

    public function edit($id){
        $disease = Disease::findOrFail($id);
        $categories = Category::orderBy('created_at')->get();
        
        
        return view('disease.edit',[
            'disease' => $disease,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id){
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];  

        if(!empty($request->image)){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('disease.edit')->withInput()->withErrors($validator);
        }

        $disease = Disease::findOrFail($id);
        $disease->name = $request->name;
        $disease->description = $request->description;
        $disease->status = $request->status;
        $disease->category_id = $request->category_id;
        $disease->save();

        if(!empty($request->image)){
            File::delete(public_path('uploads/disease'.$disease->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/disease'), $imageName);

            $disease->image = $imageName;
            $disease->save();
        }

        return redirect()->route('disease.index')->with('success', 'Disease post updated successfully');

    }

    public function destroy($id){
        $disease = Disease::findOrFail($id);

        if($disease->image){
            $imagepath = public_path('uploads/disease'.$disease->image);
            if(file_exists($imagepath)){
                unlink($imagepath);
            }
        }

        $disease->delete();
        return redirect()->route('disease.index')->with('success', 'Disease post deleted successfully');
    }
}
