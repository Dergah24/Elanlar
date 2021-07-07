@extends('Back.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Panel Static Labels -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Elan</h3>
            </div>
            <div class="panel-body container-fluid">
                <form method="post" action="{{ route('advertisement.store') }}"enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            
                                <label for="exampleInputEmail1" class="form-label">Elan Adı <span
                                        style="color: red;font-size: 18px;bold">{{ $errors->first('title') }}</span></label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                           
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label">Kateqoriya </label>
                            <select name="category_id" class="form-select form-select-lg mb-3 form-control"
                                aria-label=".form-select-lg example">

                                 @foreach ($categories as $category)
                                 <option style="font-size: 24px;" value="{{ $category->id }}">{{ $category->title }}</option>
     
                                 @if(count($category->categories)>0)
                                  @foreach ($category->categories as $childCategory)
                                     <option style="font-size: 20px;" value="{{ $childCategory->id }}">--{{ $childCategory->title }}</option>
                                     @if(count($childCategory->categories)>0)
                                         @foreach ($childCategory->categories as $childCategory)
                                         <option style="font-size:15px" value="{{ $childCategory->id }}">----{{ $childCategory->title }}</option>
                                         @endforeach
                                     @endif
                                     @endforeach
                                 @endif
                                 @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 mb-20">
                        <label for="exampleInputEmail1" class="form-label">Məzmun <span
                                style="color: red;font-size: 18px;bold">{{ $errors->first('desc') }}</span></label>
                        <textarea name="desc" id="mytextarea" class="form-control mytextarea" cols="30" rows="10" style="height:300px">{{ old('desc') }}</textarea>
                    </div>
                    <div class="row mb-20">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Qiymət <span
                                    style="color: red;font-size: 18px;bold">{{ $errors->first('price') }}</span></label>
                            <input type="number"  value="{{ old('price') }}" name="price" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleDataList" class="form-label">Şəhər </label>
                            <select name="city" class="form-select form-select-lg mb-3 form-control"
                                aria-label=".form-select-lg example">
                                <option value="Baki">Baki</option>
                                <option value="Gence">Gence</option>
                            </select>
                      </div>
                    </div>
                    <div class="row mb-20">
                        <div class="mb-3 col-md-6">
                           
                        </div>
                        <div class="mb-3 col-md-6">
                            
                        </div>
                    </div>
                    <div class="row mb-20">
                      <div class="mb-3 col-md-2">
                          <label for="exampleDataList" class="form-label">Yeni ? </label>
                          <input name="quality" type="checkbox" data-plugin="switchery" data-switchery="true"
                          style="display: none;">
                      </div>
                      <div class="mb-3 col-md-2">
                        <label for="delivery" class="form-label">Çatdırılma ? </label>
                        <input name="delivery" type="checkbox" data-plugin="switchery" data-switchery="true"
                        style="display: none;">
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="preminum" class="form-label">Premium ?</label>
                        <input name="premium" type="checkbox" data-plugin="switchery" data-switchery="true"
                        style="display: none;">
                    </div>
                    <div class="mb-3 col-md-2">
                      <label for="vip" class="form-label">Vip ?</label>
                      <input name="vip" type="checkbox" data-plugin="switchery" data-switchery="true"
                      style="display: none;">
                  </div>
                    <div class="mb-3 col-md-4">
                      <label for="exampleDataList" class="form-label">Status </label>
                      <select name="status" class="form-select form-select-lg mb-3 form-control"
                          aria-label=".form-select-lg example">
                          <option value="1">Gözləmədə</option>
                          <option value="2">Təstiqləndi </option>
                          <option value="3">Rədedildi</option>
                          <option value="4">Vaxdi bitmis</option>
                      </select>
                  </div>
                  </div>
                    <div class="mb-3 form-check">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="col-12">
                                    <label  class="form-label">Elan şəkillər
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

<script>
 $(document).ready(function () {
        $('#editor').ckeditor();
    });

</script>
@endsection
