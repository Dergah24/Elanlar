<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = Category::all();
        // return  $allCategories = Category::pluck('title','id')->all();
        return view('Back.category.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            $categories  = Category::with('categories.categories')->where('parent_id',0)->get();
        return view('Back.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image')){
           $name = $request->image->getClientOriginalName();
           $namePath = 'categoriIcon/'.$name;
           $request->image->move(public_path('categoriIcon/',$name));
       }

       Category::create([
        'title'=>$request->title,
        'parent_id'=>$request->parent_id ? $request->parent_id : 0,
        'main'=>$request->main =="on" ? 1 : 0,
        'image'=>$namePath,
        'slug'=>Str::slug($request->title)
       ]);

       return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thisCategory = Category::where('id',$id)->first();
        $categories  = Category::with('categories.categories')->where('parent_id',0)->get();
        return view('Back.category.update',compact('thisCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->file('image')){
            $name = $request->image->getClientOriginalName();
            $namePath = 'categoriIcon/'.$name;
            $request->image->move(public_path('categoriIcon/',$name));
            $data = ['image'=>$namePath];
        }

        $data = [
         'title'=>$request->title,
         'parent_id'=>$request->parent_id ? $request->parent_id : 0,
         'main'=>$request->main =="on" ? 1 : 0,
         'slug'=>Str::slug($request->title)
        ];
 
        Category::whereId($id)->update($data);
 
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
