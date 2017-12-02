@extends('layouts.master')

@section('title')
    Page not found
@endsection

@section('style')
    <style type="text/css">
    	.page-not-found{
    		height: auto;
    		width: auto;
    		background-image: url('');
    		background-repeat: no-repeat;
    		background-position: center;
    		text-align: center;
    	}
    	.page-not-found img{
    		width: 48%;
    	}
    </style>
@endsection

@section('content')
    <section class="container-fluid inner-shadow px-0 py-5 partners app-parcel-container">
    	<section class="container py-2">
			<div class="alert alert-info text-center">
				<p>The page you are looking for is available for the moment, or you might missing spelling the url!</p>
			</div>
	    	<div class="page-not-found">
	    		<img src="/images/page-not-found.png" alt="box to shop page not found">
	        </div>
		</section>


    </section>
@endsection
@section('script')
    <script src="{{asset('js/app.js')}}" ></script>
@endsection