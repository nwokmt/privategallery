@extends('layouts.app')

@section('content')
<style>
.btn btn-primary {text-decoration: none;}
</style>
<div class="container">
  <h1>商品詳細</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
              <div class="card-header">
                  <h3>商品</h3>
              </div>
                <div class="card-body">
		<div align="center">
			@if ($item->image)
				<img src="{{ ($item->image) }}">
			@endif
                  <h2>{{ ($item->name) }}</h2>
		  <p>{{ ($item->price) }}円</p>
		  <p>{{ ($item->description) }}</p>
		</div>
	          <div class="row justify-content-center">
                  <a class="btn btn-warning" href="/admin/item/edit/{{ ($item->id) }}">編集する
                  </a>
                  </div>      
            </div>
        </div>
    </div>
</div>
@endsection

