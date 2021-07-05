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
                <form method="post" action="{{ route('advertisement.update',$thisAdvertisement->id) }}"
                    enctype="multipart/form-data">
                    @method('Put')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Elan Adı <span
                                style="color: red;font-size: 18px;bold">{{ $errors->first('title') }}</span></label>
                        <input type="text" value="{{$thisAdvertisement->title }}" name="title" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 mb-20">
                        <label for="exampleInputEmail1" class="form-label">Məzmun <span
                                style="color: red;font-size: 18px;bold">{{ $errors->first('desc') }}</span></label>
                        <textarea name="desc" id="editor" class="form-control" cols="30"
                            rows="10">{{ $thisAdvertisement->desc }}</textarea>


                    </div>
                    <div class="row mb-20">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Qiymət <span
                                    style="color: red;font-size: 18px;bold">{{ $errors->first('price') }}</span></label>
                            <input type="text" value="{{ $thisAdvertisement->price }}" name="price" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Marka <span
                                    style="color: red;font-size: 18px;bold">{{ $errors->first('marka') }}</span></label>
                            <input type="text" value="{{ $thisAdvertisement->marka}}" name="marka" class="form-control"
                                id="exampleInputEmail1">
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="mb-3 col-md-6">
                            <label for="exampleDataList" class="form-label">Kateqoriya </label>
                            <select name="category_id" class="form-select form-select-lg mb-3 form-control"
                                aria-label=".form-select-lg example">

                                @foreach ($categories as $category)
                                <option @if($thisAdvertisement->category_id == $category->id)selected @endif
                                    value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleDataList" class="form-label">Şəhər </label>
                            <select name="city" class="form-select form-select-lg mb-3 form-control"
                                aria-label=".form-select-lg example">
                                <option @if($thisAdvertisement->city == "Baki")selected @endif value="Baki">Baki
                                </option>
                                <option @if($thisAdvertisement->city == "Gence")selected @endif value="Gence">Gence
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="mb-3 col-md-3">
                            <label for="exampleDataList" class="form-label">Yeni ? </label>
                            <input @if($thisAdvertisement->quality )checked @endif name="quality" type="checkbox"
                            data-plugin="switchery" data-switchery="true"
                            style="display: none;">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="exampleDataList" class="form-label">Çatdırılma ? </label>
                            <input @if($thisAdvertisement->delivery ) checked @endif name="delivery" type="checkbox"
                            data-plugin="switchery" data-switchery="true"
                            style="display: none;">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleDataList" class="form-label">Status </label>
                            <select name="status" class="form-select form-select-lg mb-3 form-control"
                                aria-label=".form-select-lg example">
                                <option value="Gözləmədə">Gözləmədə</option>
                                <option value="Təstiqləndi">Təstiqləndi </option>
                                <option value="Təsdiqlənmədi">Təsdiqlənmədi</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="col-12">
                                    <label class="form-label">Kateqoriya icon
                                        <span
                                            style="color: red;font-size: 18px;bold">{{ $errors->first('image') }}</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <input type="file" name="images[]" multiple>
                                </div>
                            </div>
                            @foreach($images as $file)
                            <div class="col-md-2">

                                <div class="example">
                                    <img class="img-circle" width="150" height="150" src="{{ asset($file->title) }}"
                                        alt="...">
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

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))

        .then(editor => {
            console.log(editor);

        })
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
