<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $category_list = Category::all();
            return view('category.index',compact('category_list'));
        }else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('category.create');
        }else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'cat_name' => ['required'],
                'cat_description' => ['required'],
            ]);  
            $category = new Category;
            $category->name=$request->post('cat_name');
            $category->description=$request->post('cat_description');
            $category->save();
            return redirect()->route('category.index');
        }else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        if (Auth::check()) {
            $category = Category::find($id);
            return view('category.view', compact('category'));
        }else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $category = Category::find($id);
            return view('category.edit', compact('category'));
        }else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        if (Auth::check()) {
            $category = Category::find($id);
            $category->name=$request->post('cat_name');
            $category->description=$request->post('cat_description');
            $category->save();
            return redirect()->route('category.index')->with('Success','Category Updated');
        }else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $category = Category::find($id);
            $category->delete();
            return redirect('category')->with('success', 'category has been deleted');       
        }else{
            return redirect()->route('home');
        }
       
    }
}
