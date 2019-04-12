@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>商品一覧</h1>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><br></th>
                                <th><br></th>
                                <th><br></th>
                                <th><br></th>
                                <th><a class="btn btn-primary" href="{{ action('Admin\ItemController@add') }}">新規作成</a></th>
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
                             @foreach($items as $item)
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
 					<a class="btn btn-primary" href="{{ action('Admin\ItemController@detail', ['id' => $item->id]) }}">詳細</a><br><br>
 					<a class="btn btn-primary" href="{{ action('Admin\ItemController@edit', ['id' => $item->id]) }}">編集</a><br><br>
 					<a class="btn btn-primary" href="{{ action('Admin\ItemController@delete', ['id' => $item->id]) }}">削除</a>
                                        
                                    </td>
                                </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection