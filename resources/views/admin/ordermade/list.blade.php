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
                                <th width="20%">発注日時</th>
                                <th width="10%">発注者</th>
                                <th width="20%">種類</th>
                                <th width="20%">素材</th>
                                <th width="20%">色</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($ordermades as $ordermade)
                                <tr>
                                    <td>{{ ($ordermade->created_at) }}</td>
                                    <td>{{ ($ordermade->name) }}</td>
                                    <td>{{ ($ordermade->type) }}</td>
                                    <td>{{ ($ordermade->material) }}</td>
                                    <td>{{ ($ordermade->color) }}</td>
				    <td align="center">
 					<a class="btn btn-primary" href="{{ action('Admin\OrdermadeController@detail', ['id' => $ordermade->id]) }}">詳細</a><br><br>
                                        
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