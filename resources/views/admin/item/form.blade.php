@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>商品編集</h1>
                <form action="{{ action('Admin\ItemController@save') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

@if (empty($item))
                              <input type="hidden" class="form-control" name="name" value="">
@else
                              <input type="hidden" class="form-control" name="name" value="{{ old('id',$item->id) }}">
@endif
                    <div class="row justify-content-center">
                    <div class="col-lg-8">
                    <div class="card">
                    <div class="card-body">
                      <div class="form-group row">
                          <label class="col-md-2" for="name">商品名</label>
                              <div class="col-md-6">
                              <input type="text" class="form-control" name="name" value="{{ old('name',$item->name) }}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">金額</label>
                              <div class="col-md-6">
                              <input type="number" style="width:80%;display:inline" class="form-control" name="price" value="{{ old('name',$item->price) }}">円
                          </div>
                      </div>
                          <div class="form-group row">
                              <label class="col-md-2" for="introduction">説明</label>
                              <div class="col-md-9">
                                <textarea class="form-control" name="description" rows="8">{{ old('description',$item->description) }}</textarea>
                              </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-md-2" for="image">画像</label>
                             <div class="col-md-8">
<!------ img ------>
<label class="verify_person__formbox__item_profile-img-upload" id="photo_frame1">
<input type="file" accept="image/*" class="fileData">
<div id="description1">
			@if (old('image') || !empty($item->image))
                <img src="{{ old('image',$item->image) }}" id="image_thum" width="150">
                <input type="hidden" name="image" id="image_src" value="{{ old('image',$item->image) }}">
            @else
                <img src="/img/noimg.png" id="image_thum" width="150">
                <input type="hidden" name="image" id="image_src" value="{{ old('image') }}">
			@endif
</div>
</label>
<!------ img ------>
                             </div>
                         </div>
                         {{ csrf_field() }}
                         <div class="row justify-content-center">
                         <input type="submit" class="btn btn-warning" value="更新">
                         </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection