@extends('Back.layout.master')

<style>
    .card img{
        object-fit: cover;
        height: 200px;
       
    }
    .card i{
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 25px;
    }

    .ck-content{
        height: 200px;
    }
</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Panel Static Labels -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Elan</h3>
            </div>
            <div class="panel-body container-fluid">
                <form method="post" action="{{ route('advertisement.update',$thisAdvertisement->id) }}"
                    enctype="multipart/form-data">
                    @method('Put')
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Doldurulması vacib olan sahələr <span class="this-reduire"></span></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            
                                <label for="exampleInputEmail1" class="form-label this-reduire">Elan Adı <span
                                        style="color: red;font-size: 18px;bold">{{ $errors->first('title') }}</span></label>
                                <input type="text" value="{{ $thisAdvertisement->title }}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                           
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label this-reduire">Kateqoriya </label>
                            <select name="category_id" class="form-select form-select-lg mb-3 form-control"  aria-label=".form-select-lg example">

                                 @foreach ($categories as $category)
                                 <option @if($category->id == $thisAdvertisement->category_id) selected @endif class="option-tree" value="{{ $category->id }}">{{ $category->title }}</option>
     
                                 @if(count($category->categories)>0)
                                  @foreach ($category->categories as $childCategory)
                                     <option @if($childCategory->id == $thisAdvertisement->category_id) selected @endif class="option-tree" value="{{ $childCategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $childCategory->title }}</option>
                                     @if(count($childCategory->categories)>0)
                                         @foreach ($childCategory->categories as $childCategory)
                                         <option @if($childCategory->id == $thisAdvertisement->category_id) selected @endif class="option-tree" value="{{ $childCategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $childCategory->title }}</option>
                                         @endforeach
                                     @endif
                                     @endforeach
                                 @endif
                                 @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="mb-3 mb-20">
                        <label for="exampleInputEmail1" class="form-label this-reduire">Məzmun <span  style="color: red;font-size: 18px;bold">{{ $errors->first('desc') }}</span></label>
                        <textarea id="editor"  name="desc"class="form-control " cols="30"rows="10">{{ $thisAdvertisement->desc }}</textarea>
                    </div>
                    <div class="row mb-20">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail12" class="form-label this-reduire">Qiymət <span  style="color: red;font-size: 18px;bold">{{ $errors->first('price') }}</span></label>
                            <input type="text" value="{{ $thisAdvertisement->price }}" name="price" class="form-control"         id="exampleInputEmail12">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleDataList" class="form-label ">Şəhər </label>
                            <select name="city" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                @foreach ($cities as  $city)
                                 <option @if($thisAdvertisement->city == $city->id) selected @endif value="{{ $city->id }}">{{ $city->name }}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label for="exampleDataList" class="form-label">Yeni ? </label>
                                        <div>
                                            <input @if($thisAdvertisement->quality )checked @endif name="quality" type="checkbox"    data-plugin="switchery" data-switchery="true"       style="display: none;">
                                        </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="exampleDataList" class="form-label">Çatdırılma ? </label>
                                        <div>
                                            <input @if($thisAdvertisement->delivery ) checked @endif name="delivery" type="checkbox"   data-plugin="switchery" data-switchery="true"   style="display: none;">
                                        </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="premium" class="form-label">Premium ?</label>
                                    <div>
                                        <input @if($thisAdvertisement->premium ) checked @endif  name="premium" type="checkbox" data-plugin="switchery" data-switchery="true"   style="display: none;">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Vip ? </label>
                                    <div>
                                        <input @if($thisAdvertisement->premium ) checked @endif  name="premium" type="checkbox" data-plugin="switchery" data-switchery="true"   style="display: none;">
                                    </div>
                              </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label this-reduire">Status </label>
                            <select name="status" class="form-select form-select-lg mb-3 form-control" >
                                <option @if($thisAdvertisement->satus ==1 ) slected @endif value="1">Gözləmədə</option>
                                <option @if($thisAdvertisement->satus ==2 ) slected @endif value="2">Təstiqləndi </option>
                                <option @if($thisAdvertisement->satus ==3 ) slected @endif value="3">Rədedildi</option>
                                <option @if($thisAdvertisement->satus ==4 ) slected @endif value="4">Vaxdi bitmis</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-12">
                                    <label class="form-label this-reduire">Kateqoriya icon
                                        <span
                                            style="color: red;font-size: 18px;bold">{{ $errors->first('image') }}</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <input type="file" name="images[]" multiple>
                                </div>
                            </div>
                            @foreach($images as $file)
                            <div class="col-md-2 card-{{ $file->id }}" >

                                <div class="example"  style=" ">
                                    <div class="card">
                                        <i style="color: red" class="fas fa-trash delete" id="{{ $file->id }}" ></i>
                                        <img src="{{ asset($file->title) }}" class="img-fluid w-full f-full "  alt="{{ $file->title }}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Yadda saxla</button>
                </form>
            </div>
        </div>
        <!-- End Panel Static Labels -->
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
    

    $(".delete").click(function(){
        let img = $(this).attr("id");
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let card = ".card-" + img;
        if(confirm(" Bu şəkil silinsin?")){
        $.ajax({
        url: "{{ route('deleteImage') }}",
        type:"POST",
        data:{
          img:img,
          _token: _token
        },
        success:function(response){
          console.log(response);
            $(card).remove();

        },
       });
    }
    });
});
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
