@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>注文内容</h1>

                    <div class="row justify-content-center">
                    <div class="col-lg-8">
                    <div class="card">
                    <div class="card-body">
                      <div class="form-group row">
                          <label class="col-md-2" for="name">名前</label>
                              <div class="col-md-6">
                              {{ $order->name }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">郵便番号</label>
                              <div class="col-md-6">
                              {{ $order->postalcode }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">住所</label>
                              <div class="col-md-6">
                              {{ $order->address }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">支払い方法</label>
                              <div class="col-md-6">
                              {{ $order->payment }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">支払い金額</label>
                              <div class="col-md-6">
                              {{ $total+ Config::get('const.postage')}}円　(　商品合計:{{ $total }}円＋送料：{{Config::get('const.postage')}}円　)
                          </div>
                      </div>


                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="5">注文商品</th>
                            </tr>
                            <tr>
                                <th width="20%">画像</th>
                                <th width="30%">商品名</th>
                                <th width="10%">金額</th>
                                <th width="40%">説明</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($items as $key=>$item)
                                <tr>
<td>
@if(empty($item->image))
                                <img src="/img/noimg.png" id="image_thum" width="150">
@else
                                  <img src="{{ $item->image }}" id="image_thum" width="150">
@endif
</td>
                                    <td>{{ ($item->name) }}</td>
                                    <td>{{ ($item->price) }}円</td>
                                    <td>{{ ($item->description) }}</td>
                                </tr>
                             @endforeach
                        </tbody>
                    </table>

                             </div>
                         </div>
                         {{ csrf_field() }}
                         <div class="row justify-content-center">
                         <input type="button" onclick="location.href='/admin/order'" class="btn btn-warning" value="一覧に戻る">
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