@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>オーダーメイド注文内容</h1>

                    <div class="row justify-content-center">
                    <div class="col-lg-8">
                    <div class="card">
                    <div class="card-body">
                      <div class="form-group row">
                          <label class="col-md-2" for="name">名前</label>
                              <div class="col-md-6">
                              {{ $ordermade->name }}
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
                              {{ $orderMadePrice+ Config::get('const.postage')}}円　(　商品合計:{{ $orderMadePrice }}円＋送料：{{Config::get('const.postage')}}円　)
                          </div>
                      </div>


                    <table class="table table-hover">
                            <tr>
                                <th colspan="5">注文商品</th>
                            </tr>
                            <tr>
                                <th width="30%">種類</th><td>{{ ($ordermade->type) }}</td>
                            </tr>
                            <tr>
                                <th width="30%">素材</th><td>{{ ($ordermade->material) }}</td>
                            </tr>
                            <tr>
                                <th width="30%">色</th><td>{{ ($ordermade->color) }}</td>
                            </tr>
                    </table>

                             </div>
                         </div>
                         {{ csrf_field() }}
                         <div class="row justify-content-center">
                         <input type="button" onclick="location.href='/admin/ordermade/list'" class="btn btn-warning" value="一覧に戻る">
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