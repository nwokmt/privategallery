@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (!empty($profiles))
                    <a href="/admin/profile">[プロフィール確認]</a>
                    @endif
                    <a href="/admin/profile/edit">[プロフィール編集]</a>
<br>
                    <a href="/admin/item">[商品一覧]</a>

<br>
                    <a href="/admin/order">[注文一覧]</a>
<br>
                    <a href="/admin/ordermade/list">[オーダーメイド注文一覧]</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
