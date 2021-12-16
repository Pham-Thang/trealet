@extends('layouts.app')

@section('page-title', 'Play details')
@section('page-heading', 'Play details')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        The details of your Trealet
    </li>
@stop


@section('content')
    @include('partials.messages')

    <div class="card"><div class="card-body">
            @csrf

            <form action="/edit_trealet/{{$trealet->id}}" method="post" >
                <div><h2>Chỉnh sửa trealet của bạn tại đây!</h2></div>
                @csrf
                <div class="form-group">
                    <label for="title">@lang('Tên trealet')</label>
                    <input type="text" class="form-control input-solid" id="title"
                           name="title" placeholder="@lang('Tên trealet')" value="{{ $trealet->title }}">
                </div>


                <div>
                <div class="form-group">

                    <label for="published">Publish</label>

                    <select name="published" class="form-control" style="width:250px" >
                        @if ($trealet->published == 0)
                            <option value="0" selected>No one</option>
                            <option value="1">Everyone</option>
                            <option value="2">Everyone with key</option>
                            aaaa
                        @endif
                        @if ($trealet->published == 1)
                            <option value="1" selected>Everyone</option>

                            <option value="2">Everyone with key</option>
                            <option value="0">No one</option>
                        @endif
                        @if ($trealet->published == 2)
                            <option value="2" selected>Everyone with key</option>
                            <option value="1">Everyone</option>
                            <option value="0">No one</option>
                        @endif

                    </select>
                </div>
                    <div class="form-group" style="width:250px" >
                        <label for="title">@lang('Key ')</label>
                        <input type="text" class="form-control input-solid" id="title"
                               name="key" placeholder="@lang('')"  value="{{$trealet->pass}}" >
                    </div>


                <div class="col-md-12 mt-2" >
                    <button type="submit" class="btn btn-primary" id="update-details-btn" >
                        <i class="fa fa-refresh"></i>
                        @lang('Update Trealet')
                    </button>
                    @if($trealet->type == \Vanguard\Trealets::STEPQUEST_TYPE)
                    <a class="btn btn-primary" id="update-details-btn" href="{{ route('stepquest-edit.edit', $trealet->id) }}" >
                        <i class="fa fa-refresh"></i>
                        @lang('Edit Stepquest')
                    </a>
                    @endif

                </div>


            </form>


        </div>

    </div>
@stop
@section('styles')
    <style>
        .card {
            width: 50%;
        }
        .user.media {
            float: left;
            border: 1px solid #dfdfdf;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 4px;
            margin-right: 15px;
        }
        .form-control input-solid{
            background-color: white;
        }
    </style>
@stop

