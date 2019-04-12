@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>カートの中身</h1>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
@if(empty($items))
<center>カートの中に商品が入っていません。</center>
@else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><br></th>
                                <th><br></th>
                                <th><br></th>
                                <th><br></th>
                                <th><a class="btn btn-primary" href="{{ action('OrderController@order') }}">この内容で注文する</a></th>
                            </tr>
                            <tr>
                                <th width="20%">画像</th>
                                <th width="20%">商品名</th>
                                <th width="10%">金額</th>
                                <th width="40%">説明</th>
                                <th width="10%"></th>
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
				    <td align="center">
 					<a class="btn btn-primary" href="{{ action('OrderController@detail', ['id' => $item->id]) }}">詳細</a><br><br>
 					<a class="btn btn-primary" href="{{ action('OrderController@remove', ['id' => $key]) }}">削除</a>
                                        
                                    </td>
                                </tr>
                             @endforeach
                        </tbody>
                    </table>
@endif
                </div>
            </div>
        </div>
    </div>
@endsection