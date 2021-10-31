@extends('layouts.app')

@section('page-title', 'Streamline Edit')
@section('page-heading', 'Streamline Edit')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
	You can edit your streamline trealet here
    </li>
@stop

@section('content')






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