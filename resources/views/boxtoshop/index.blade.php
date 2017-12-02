@extends('layouts.master')

@section('title')
    Send Parcels
@endsection

@section('style')
    <link href="{{asset('css/material.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('css/react-zilla-style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/react-tabs-custom.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/react-popup.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <section class="container-fluid inner-shadow px-0 py-5 partners app-parcel-container">

        <div id="parcel"></div>

    </section>
@endsection
@section('script')
    <script src="{{asset('js/app.js')}}" ></script>
@endsection