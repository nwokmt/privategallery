@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>オーダーメイド注文内容</h1>
                <form action="{{ action('OrdermadeController@confirm') }}" method="post" enctype="multipart/form-data">

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
                                <select name="type" required class="form-control">
                                <option>選択してください</option>
                                <option value="ピアス" @if(old('type')=="ピアス") selected @endif>ピアス</option>
                                <option value="イヤリング" @if(old('type')=="イヤリング") selected @endif>イヤリング</option>
                                <option value="指輪" @if(old('type')=="指輪") selected @endif>指輪</option>
                                <option value="ブレスレット" @if(old('type')=="ブレスレット") selected @endif>ブレスレット</option>
                                <option value="ネックレス" @if(old('type')=="ネックレス") selected @endif>ネックレス</option>
                                </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">素材</label>
                              <div class="col-md-6">
                                <select name="material" required class="form-control">
                                <option>選択してください</option>
                                <option value="パール" @if(old('material')=="パール") selected @endif>パール</option>
                                <option value="ビーズ" @if(old('material')=="ビーズ") selected @endif>ビーズ</option>
                                <option value="天然石" @if(old('material')=="天然石") selected @endif>天然石</option>
                                <option value="ブレスレット" @if(old('material')=="ブレスレット") selected @endif>ブレスレット</option>
                                </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">色</label>
                              <div class="col-md-6">
                                <select name="color" required class="form-control">
                                <option>選択してください</option>
                                <option value="赤" @if(old('color')=="赤") selected @endif>赤</option>
                                <option value="青" @if(old('color')=="青") selected @endif>青</option>
                                <option value="緑" @if(old('color')=="緑") selected @endif>緑</option>
                                <option value="黄" @if(old('color')=="黄") selected @endif>黄</option>
                                <option value="透明" @if(old('color')=="透明") selected @endif>透明</option>
                                <option value="黒" @if(old('color')=="黒") selected @endif>黒</option>
                                <option value="白" @if(old('color')=="白") selected @endif>白</option>
                                </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">名前</label>
                              <div class="col-md-6">
                              <input type="text" required class="form-control" name="name" value="{{ old('name') }}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">郵便番号</label>
                              <div class="col-md-6">
                              <input type="text" class="form-control" pattern="\d{3}-?\d{4}" name="postalcode" value="{{ old('postalcode') }}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">住所</label>
                              <div class="col-md-6">
                              <input type="text" required class="form-control" name="address" value="{{ old('address') }}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2" for="name">支払い方法</label>
                              <div class="col-md-6">
                                <select name="payment" required class="form-control">
                                <option>選択してください</option>
                                <option value="銀行振込" @if(old('payment')=="銀行振込") selected @endif>銀行振込</option>
                                <option value="着払い" @if(old('payment')=="着払い") selected @endif>着払い</option>
                                <option value="コンビニ払い" @if(old('payment')=="コンビニ払い") selected @endif>コンビニ払い</option>
                                </select>
                          </div>
                      </div>

                             </div>
                         </div>
                         {{ csrf_field() }}
                         <div class="row justify-content-center">
                         <input type="submit" class="btn btn-warning" value="注文内容確認">
                         </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div id="modal">
 
<div id="open01">
<a href="#" class="close_overlay">×</a>
<div class="modal_window">
<h2>種類を選択</h2>
                                <select name="type" required class="form-control">
                                <option>選択してください</option>
                                <option value="ピアス" @if(old('type')=="ピアス") selected @endif>ピアス</option>
                                <option value="イヤリング" @if(old('type')=="イヤリング") selected @endif>イヤリング</option>
                                <option value="指輪" @if(old('type')=="指輪") selected @endif>指輪</option>
                                <option value="ブレスレット" @if(old('type')=="ブレスレット") selected @endif>ブレスレット</option>
                                </select>
</div><!--/.modal_window-->
</div><!--/#open01-->

</div><!--/#modal-->

@endsection