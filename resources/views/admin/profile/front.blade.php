@extends('layouts.app')

@section('content')
<style>
.btn btn-primary {text-decoration: none;}
</style>
<div class="container">
  <h1>Myページ</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
              <div class="card-header">
                  <h3>Myプロフィール</h3>
              </div>
                <div class="card-body">
		<div align="center">
			@if ($profiles->image)
				<img src="{{ ($profiles->image) }}">
			@endif
                  <h2>{{ ($profiles->name) }}</h2>
		  <p>{{ ($profiles->introduction) }}</p>
		</div>
	          <div class="row justify-content-center">
                  <a class="btn btn-warning" href="{{ route('profile') }}">編集する
                  </a>
                  </div>      
            </div>
        </div>
    </div>
</div>
@endsection

