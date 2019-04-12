@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>注文一覧</h1>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="30%">発注日時</th>
                                <th width="40%">発注者</th>
                                <th width="20%">支払い方法</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($orders as $order)
                                <tr>
                                    <td>{{ ($order->created_at) }}</td>
                                    <td>{{ ($order->name) }}</td>
                                    <td>{{ ($order->payment) }}</td>
				    <td align="center">
 					<a class="btn btn-primary" href="{{ action('Admin\OrderController@detail', ['id' => $order->id]) }}">詳細</a><br><br>
                                        
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