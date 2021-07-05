<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use App\Models\adv_image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Advertisements;
use App\Http\Requests\AdvStore;
use App\Http\Requests\AdvUpdate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
       
        View::share('categories',Category::all());
    }
    public function index()
    {
        $advertisements  = Advertisements::orderBy('created_at','asc')->get();
       return view('Back.advertisement.list',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvStore $request)
    {
        //return $request->all();

        if($request->quality == "on"){
            $data =[ 'quality'=>1];
        }else{
            $data =[ 'quality'=>0];
        }

        if($request->delivery == "on"){
            $data =[ 'delivery'=>1];
        }else{
            $data =[ 'delivery'=>0];
        }

       
        $data = [
            'user_id'=>Auth::user()->id,
            'cataegory_id'=>$request->category_id,
            'title'=>$request->title,
            'desc'=>$request->desc,
            'price'=>$request->price,
            'marka'=>$request->marka,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'city'=>$request->city,
            'slug'=>Str::slug($request->title)
            
            
        ];

          $adv = Advertisements::create($data);  
        if($request->file('images')){
            
            foreach($request->file('images') as $file){
                $name = Str::slug( time().'.'.$file->getClientOriginalName()); 
                $namePath= "AdversImg/".$name;
                $file->move(public_path("AdversImg/"),$name);
                adv_image::create([
                    'advertisement_id'=>$adv->id,
                    'title'=>$namePath
                ]);
            }
        }

        return  redirect()->route('advertisement.index');
     
     
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thisAdvertisement   = Advertisements::whereId($id)->first();
        $images =  adv_image::where('advertisement_id',$id)->get();
       return view('Back.advertisement.update',compact('thisAdvertisement','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvUpdate $request, $id)
    {
       
        if($request->quality == "on"){
            $data =[ 'quality'=>1];
        }else{
            $data =[ 'quality'=>0];
        }

        if($request->delivery == "on"){
            $data =[ 'delivery'=>1];
        }else{
            $data =[ 'delivery'=>0];
        }

       
        $data = [
            'user_id'=>Auth::user()->id,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'desc'=>$request->desc,
            'price'=>$request->price,
            'marka'=>$request->marka,
            'status'=>$request->status,
            'city'=>$request->city,
            'slug'=>Str::slug($request->title)
        ];

          $adv = Advertisements::whereId($id)->update($data);  
        if($request->file('images')){
            
            foreach($request->file('images') as $file){
                $name = Str::slug( time().'.'.$file->getClientOriginalName()); 
                $namePath= "AdversImg/".$name;
                $file->move(public_path("AdversImg/"),$name);
                adv_image::create([
                    'advertisement_id'=>$id,
                    'title'=>$namePath
                ]);
            }
        }

        return  redirect()->route('advertisement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $adv = Advertisements::whereId($id)->first();
       $images = adv_image::whereId('advertisement_id',$id)->get();
       foreach($images as $file){
           unlink($dile);
       }
       $adv->delete();
       return  redirect()->back();
    }
}
