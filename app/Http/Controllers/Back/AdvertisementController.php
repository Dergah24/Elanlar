<?php

namespace App\Http\Controllers\Back;

use Carbon\Carbon;
use App\Models\City;
use App\Models\advimage;
use App\Models\Category;
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
        $categories =  Category::with(['categories.categories'])->where('parent_id',0)->get();
        $cities = City::all();
        View::share(compact('categories','cities'));
    }
    public function index()
    {
           
      $advertisements  = Advertisements::with('images')->get();
             
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
        $data = [
            'user_id'=>Auth::user()->id,
            'cataegory_id'=>$request->category_id,
            'title'=>$request->title,
            'desc'=>$request->desc,
            'price'=>$request->price,
            'vip'=>($request->vip == "on") ? 1 : 0 ,
            'vip_end'=>($request->vip == "on") ?  Carbon::now()  : 0 ,
            'premium'=>($request->premium == "on") ? 1 : 0 ,
            'premium_end'=>($request->premium == "on") ? Carbon::now() : 0 ,
            'delivery'=>($request->delivery == "on" ) ? 1 : 0 ,
            'quality'=>($request->quality == "on") ? 1 : 0 ,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'city_id'=>$request->city,
            'slug'=>Str::slug($request->title)
        ];

       // return $data;
        $adv = Advertisements::create($data);  

        if($request->file('images')){
            foreach($request->file('images') as $file){
                $name = Str::slug( time().'.'.$file->getClientOriginalName()); 
                $namePath= "AdversImg/".$name;
                $file->move(public_path("AdversImg/"),$name);
                advimage::create([
                    'advertisement_id'=>$adv->id,
                    'title'=>$namePath
                ]);
            }
        }
        toastr()->success('Elan elave edildi');

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
        
        $images =  advimage::where('advertisement_id',$id)->get();
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
       
        $data = [
            'user_id'=>Auth::user()->id,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'desc'=>$request->desc,
            'price'=>$request->price,
            'vip'=>($request->vip == "on") ? 1 : 0 ,
            'premium'=>($request->preminum == "on") ? 1 : 0 ,
            'delivery'=>($request->delivery == "on" ) ? 1 : 0 ,
            'quality'=>($request->quality == "on") ? 1 : 0 ,
            'status'=>$request->status,
            'city_id'=>$request->city,
            'slug'=>Str::slug($request->title)
        ];

        $adv = Advertisements::whereId($id)->update($data);  
        
        if($request->file('images')){
            
            foreach($request->file('images') as $file){
                $name = Str::slug( time().'.'.$file->getClientOriginalName()); 
                $namePath= "AdversImg/".$name;
                $file->move(public_path("AdversImg/"),$name);
                advimage::create([
                    'advertisement_id'=>$id,
                    'title'=>$namePath
                ]);
            }
        }
        toastr()->success('Elan redaktə edildi');

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
       $images = advimage::whereId('advertisement_id',$id)->get();
       foreach($images as $file){
           unlink($dile);
       }
       $adv->delete();

       toastr()->success('Elan slindi');

       return  redirect()->back();
    }

    
    public function deleteImage(){
      $data =  adv_image::whereId(request()->post('img'))->first();
      unlink(adv_image::whereId(request()->post('img'))->value('title'));
      $delete =  $data->delete();
       if($delete){
        toastr()->success('Şəkil elave edildi');

            return response(true);
        }
        
    }
}
