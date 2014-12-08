@extends('layout')

@section('content')
<div class="container home">

		<h1>Arun Bakery</h1>
		@if (!Auth::check())
			<h3>Please <a href="{{ route('login') }}">log in</a></h3>
		@else
			<h3>Welcome! {{$name}}</h3>
		@endif
</div>

@endsection