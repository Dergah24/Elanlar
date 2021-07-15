@extends('Back.layout.master')
@section('content')
<div class="row">
    <style>
         .ck-content{
        height: 200px;
    }
    </style>
    <div class="col-md-12">
        <!-- Panel Static Labels -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Elan</h3>
            </div>
            <div class="panel-body container-fluid">
                <form id="my-awesome-dropzone" method="post" action="{{ route('advertisement.store') }}"enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Doldurulması vacib olan sahələr <span class="this-reduire"></span></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="exampleInputEmail1" class="form-label mb-0 this-reduire">Elan Adı <span   style="color: red;font-size: 18px;bold">{{ $errors->first('title') }}</span></label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label this-reduire">Kateqoriya </label>
                            <select name="category_id" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                                <option value="0" selected disabled>Kateqoriya seçin</option>

                                @foreach ($categories as $category)
                                 <option class="option-tree" disabled value="{{ $category->id }}">{{ $category->title }}</option>
                                 @if(count($category->categories)>0)
                                  @foreach ($category->categories as $childCategory)
                                                                 
                                  <option @if (count($childCategory->categories)>0)  disabled     @endif    class="option-tree" value="{{ $childCategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $childCategory->title }}</option>
                                     @if(count($childCategory->categories)>0)
                                         @foreach ($childCategory->categories as $childCategory)
                                         <option class="option-tree" value="{{ $childCategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $childCategory->title }}</option>
                                         @endforeach
                                     @endif
                                     @endforeach
                                 @endif
                                 @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="mb-3 mb-20">
                        <label for="exampleInputEmail1" class="form-label this-reduire">Məzmun <span style="color: red;font-size: 18px;bold">{{ $errors->first('desc') }}</span></label>
                        <textarea id="editor" name="desc"  class="form-control mytextarea" cols="30" rows="10" style="height:300px">{{ old('desc') }}</textarea>

                    </div>
                    <div class="row mb-20">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label mb-0 this-reduire">Qiymət <span style="color: red;font-size: 18px;bold">{{ $errors->first('price') }}</span></label>
                            <input type="number"  value="{{ old('price') }}" name="price" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleDataList" class="form-label this-reduire">Şəhər </label>
                            <select name="city" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                               @foreach ( $cities as $city )
                                 <option value="{{ $city->id }}">{{ $city->name }}</option>
                               @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    
                                          <label for="exampleDataList" class="form-label">Yeni ? </label>                       
                                        <div >
                                          <input name="quality" type="checkbox" data-plugin="switchery" data-switchery="true"  class="form-control" style="display: none;">
                                        </div>
                              </div>
                                <div class="mb-3 col-md-3">
                                      <label for="delivery" class="form-label">Çatdırılma ? </label>                      
                                     <div >
                                      <input name="delivery" type="checkbox" data-plugin="switchery" data-switchery="true"  class="form-control" style="display: none;">
                                     </div>
                              </div>
                              <div class="mb-3 col-md-3">
                                         <label for="premium" class="form-label">Premium ?</label>
                                     <div >
                                         <input name="premium" type="checkbox" data-plugin="switchery" data-switchery="true"  class="form-control" style="display: none;">
                                     </div>
                              </div>
                              <div class="mb-3 col-md-3">
                                      <label for="vip" class="form-label">Vip ?</label>                        
                                    <div >
                                      <input name="vip" type="checkbox" data-plugin="switchery" data-switchery="true"  class="form-control" style="display: none;">
                                    </div>
                              </div>
                            </div>
                        </div>
                    <div class="mb-3 col-md-6">
                      <label for="exampleDataList" class="form-label this-reduire">Status </label>
                      <select name="status" class="form-select form-select-lg mb-3 form-control"
                          aria-label=".form-select-lg example">
                          <option value="1">Gözləmədə</option>
                          <option value="2">Təstiqləndi </option>
                          <option value="3">Rədd edildi</option>
                          <option value="4">Vaxtı bitmiş</option>
                      </select>
                  </div>
                  </div>
                    <div class="mb-3 form-check">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-12">
                                    <label  class="form-label this-reduire">Elan şəkilləri
                                      <span
                                            style="color: red;font-size: 18px;bold">{{ $errors->first('image') }}</span>
                                    </label>
                                </div>
                                <div class="col-12 mb-20">
                                    <input  type="file" name="images[]" class="myfrm form-control" multiple required >
                                 </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Yadda saxla</button>
                </form>
            </div>
        </div>
        <!-- End Panel Static Labels -->
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script>
    
    ClassicEditor
     
        .create( document.querySelector( '#editor' ),{
            toolbar: [  '|',   'bulletedList', 'numberedList'],
        } )

         .catch( error => {
             console.error( error );
         } );
        
        


</script>

</script>


@endsection
