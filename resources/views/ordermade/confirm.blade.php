@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>注文内容</h1>
                <form action="{{ action('OrdermadeController@save') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="row justify-content-center">
                    <div class="col-lg-8">
                    <div class="card">
                    <div class="card-body">
                      <div class="form-group row">
                          <label class="col-md-2" for="name">種類</label>
                              <div class="col-md-6">
                              {{ $ordermade->type }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">素材</label>
                              <div class="col-md-6">
                              {{ $ordermade->material }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">色</label>
                              <div class="col-md-6">
                              {{ $ordermade->color }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">郵便番号</label>
                              <div class="col-md-6">
                              {{ $ordermade->postalcode }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">住所</label>
                              <div class="col-md-6">
                              {{ $ordermade->address }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">支払い方法</label>
                              <div class="col-md-6">
                              {{ $ordermade->payment }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">支払い金額</label>
                              <div class="col-md-6">
                              {{ $orderMadePrice + Config::get('const.postage')}}円　(　商品金額:{{ $orderMadePrice }}円＋送料：{{Config::get('const.postage')}}円　)
                          </div>
                      </div>

                             </div>
                         </div>
                         {{ csrf_field() }}
                         <div class="row justify-content-center">
                         <input type="submit" class="btn btn-warning" value="この内容で注文">
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