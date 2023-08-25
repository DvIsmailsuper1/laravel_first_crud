<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      //  $data=Category::all();
      $data=Category::withCount('products')->get();
        return view('categories.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      
        $request->validate([
            'name'=>'required|string|max:30',
            'info'=>'required|string',
            'activ'=>'nullable|string|in:on'
        ]);

        $category=new Category();
        $category->name=$request->input('name');
        $category->info=$request->input('info');
        $category->activ=$request->has('activ');
        $save=$category->save();
      //  return redirect()->back();
      return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category =Category::findOrFail($id);
        return view('categories.update',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        //
        $request->validate([
            'name'=>'required|string|max:30',
            'info'=>'required|string',
            'activ'=>'nullable|string|in:on'
        ]);

        $category =Category::findOrFail($id);
        $category->name=$request->input('name');
        $category->info=$request->input('info');
        $category->activ=$request->has('activ');
        $save=$category->save();
      //  return redirect()->back();
      return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category=Category::findOrFail($id);
        $deleted=$category->delete($id);
        return redirect()->back();
    }
}
