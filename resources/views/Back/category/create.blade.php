@extends('Back.layout.master')
@section('content')
<style>
  
</style>
<div class="row">
    <div class="col-md-12">
        <!-- Panel Static Labels -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Kateqoriya</h3>
            </div>
            <div class="panel-body container-fluid">
                <form method="Post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kateqoriya <span
                                style="color: red;font-size: 18px;bold">{{ $errors->first('title') }}</span></label>
                        <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDataList" class="form-label">Üst kateqoriya </label>
                        <select name="parent_id" class="form-select form-select-lg mb-3 form-control"
                            aria-label=".form-select-lg example">
                            <option value="0" selected disabled>Üst cateqoriya secin</option>
                            @foreach ($categories as $category)
                            <option class="option-tree" value="{{ $category->id }}">{{ $category->title }}</option>

                            @if(count($category->categories)>0)
                             @foreach ($category->categories as $childCategory)
                             
                                <option  class="option-tree" value="{{ $childCategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $childCategory->title }}</option>
                                @if(count($childCategory->categories)>0)
                                    @foreach ($childCategory->categories as $childCategory)
                                    <option disabled class="option-tree" value="{{ $childCategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $childCategory->title }}</option>
                                    @endforeach
                                @endif
                                @endforeach
                            @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-12">
                                    <label for="example5" class="form-label">Önə çıxart

                                    </label>
                                </div>
                                <input name="main" type="checkbox" data-plugin="switchery" data-switchery="true"
                                    style="display: none;">
                            </div>
                            <div class="col-md-6">
                                <div class="col-12">
                                    <label for="exampleInputPassword1" class="form-label">Kateqoriya icon
                                        <span
                                            style="color: red;font-size: 18px;bold">{{ $errors->first('image') }}</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <input name="image" type="file" id="exampleInputPassword1">
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
@endsection
