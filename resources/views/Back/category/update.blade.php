@extends('Back.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">
      <!-- Panel Static Labels -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Kateqoriya</h3>
        </div>
        <div class="panel-body container-fluid">
            <form method="Post" action="{{ route('category.update',$thisCategory->id) }}" enctype="multipart/form-data">
              @method('Put')
            @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Kateqoriya</label>
                  <input type="text" name="title"  value="{{ $thisCategory->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                 
                </div>
                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Üst kateqoriya</label>
                    <select name="parent_id" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                      <option  value="0" selected>Üst cateqoriya secin</option>
                      @foreach ($categories as $category)
                        <option @if($thisCategory->parent_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                      </select>
                      
                </div>
                <div class="mb-3 form-check">
                  <div class="row">
                    <div class="col-md-3">
                     <div class="col-12">
                       <label for="example5" class="form-label">Önə çıxart 
                      
                       </label>
                    </div>
                    <input name="main" type="checkbox" @if($thisCategory->main == 1) checked @endif data-plugin="switchery" data-switchery="true"
                    style="display: none;">
                    </div>
                    <div class="col-md-3">
                          <div class="col-12">
                             <label for="exampleInputPassword1" class="form-label">Kateqoriya icon 
                             <span style="color: red;font-size: 18px;bold">{{ $errors->first('image') }}</span>
                             </label>
                          </div>
                     <div class="col-12">
                       <input name="image"  type="file" id="exampleInputPassword1">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <img src="{{ asset($thisCategory->image) }}" class="img-fluid " width="100px" alt="">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Yaddsaxla</button>
              </form>
        </div>
      </div>
      <!-- End Panel Static Labels -->
    </div>

   
  </div>
@endsection
