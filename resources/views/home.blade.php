<style>
body,
html {
	height: 100%;
	margin: 0;
	font-family: Arial, Helvetica, sans-serif;
}

.uke-image {
	background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("photographer.jpg");
	height: 100%;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	position: relative;
}

.uke-text {
	text-align: center;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	color: white;
}

</style>
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
			@endif
		</div>
	</div>
</div>
<div class="uke-image">
	<div class="uke-text">
		<h1>Ukulele Mandalika</h1>
		<p>Find your Ukulele</p>
	</div>
</div>
@endsection
