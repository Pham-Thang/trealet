@extends('layouts.app')

@section('page-title', 'Maps')
@section('page-heading', 'Maps')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
	Maps trealet here
    </li>
@stop

@section('content')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.5.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.5.1/mapbox-gl.js"></script>
        <div id="page">
        <div id="app"></div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>

@stop

@section('styles')
    
    <style>
        .options {
            margin-top: 20px;
            padding: 20px;
            background: rgba(191, 191, 191, 0.15);
        }

        .options .caption {
            font-size: 18px;
            font-weight: 500;
        }

        .option {
            margin-top: 10px;
        }

        .option > span {
            margin-right: 10px;
        }

        .option > .dx-selectbox {
            display: inline-block;
            vertical-align: middle;
            max-width: 350px;
            width: 100%;
        }


    </style>
@stop