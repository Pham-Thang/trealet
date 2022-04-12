@extends('layouts.app')

@section('page-title', 'StepQuest Update')
@section('page-heading', 'StepQuest Update')

@section('breadcrumbs')
<li class="breadcrumb-item active">
    You can update your stepquest trealet here
</li>
@stop

@section('content')
<div class="stepquest-container bg-lighter">
    <div class="d-flex stepquest-header">
        <ul class="tab" id="step-number">
            <li class="step-number"><a href="#" class="tablinks active" onclick="chooseStep(event, 'info')">Thông tin</a></li>
            @foreach($stepquest['items'] as $key =>$val)
            <li class="step-number">
                <a href="#" class="tablinks" onclick="chooseStep(event, 'step{{ $key+1 }}'  )">{{ $key+1 }}</a>
            </li>
            @endforeach
            <li class="create-step font-weight-bold"><a href="#" id="new-step" class="tablinks ">+</a></li>
        </ul>
    </div>
    <div class="stepquest-content border border-primary my-scrollbar" id="steps">
        <div class="step" id="info">
            <form id="main-form">
                <div class="d-flex mb-2 px-2">
                    <div class="text-left w-110 font-500">Tiêu đề</div>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100 bg-color form-control" name="title" placeholder="Nhap Tieu De" value="{{ $stepquest['title']?? '' }}">
                    </div>
                </div>
                <div class="d-flex mb-2 px-2">
                    <div class="text-left w-110 font-500">Mô tả</div>
                    <div class="flex-grow-1">
                        <textarea class="w-100 bg-color no-resize form-control" name="des" rows="3">{{ $stepquest['des'] ?? '' }}</textarea>
                    </div>
                </div>
            </form>
        </div>
        @foreach($stepquest['items'] as $key => $val)
        <div class="step d-none" data-id="{{ $key+1 }}" id="step{{$key+1}}">
            <input type="hidden" id="key" value="{{ $val['key'] }}">
            <form>
                <div class="main-block flex justify-content-between border-bottom border-secondary gap-4">
                    <div class="box">
                        <ul class="tab tab-type mt-2" style="min-width: 550px;">
                            <li><a href="#" @if($val['type']=='Display' ) class="active" @endif onclick="chooseType(event, 'display')">Hiển
                                    thị</a></li>
                            <li><a href="#" @if($val['type']=='QR' ) class="active" @endif onclick="chooseType(event, 'qr')">QR</a></li>
                            <li><a href="#" @if($val['type']=='Quizz' ) class="active" @endif onclick="chooseType(event, 'quizz')">Câu đố</a></li>
                            <li><a href="#" @if($val['type']=='Audio' ) class="active" @endif onclick="chooseType(event, 'audio')">Âm thanh</a></li>
                            <li><a href="#" @if($val['type']=='Picture' ) class="active" @endif onclick="chooseType(event, 'picture')">Hình ảnh</a>
                            </li>
                        </ul>
                        <div class="main-data pt-3">
                            <div class="wrap-type @if($val['type'] == 'Display') d-block @else d-none @endif" id="display">
                                <h4 class="text-center">Hiển thị</h4>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Gợi ý</label>
                                        <input type="text" class="suggest form-control mb-2 ml-2" @if($val['type']=='Display' ) value="{{ $val['title'] ??'' }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Mô tả</label><textarea class="description form-control mb-2 ml-2">@if($val['type'] == 'Display') {{ $val['description']??''  }} @endif</textarea>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="d-flex">
                                        <ul id="sortable1" class="flex-grow-1 connectedSortable connectedSortable1 py-2 px-2 list-group border">
                                            @if($val['type'] == 'Display')
                                            @foreach($val['image'] ?? [] as $item)
                                            <li class="item-grab list-group-item ui-state-default text-break" data-id="{{ $item['id'] }}" style="position: relative; left: 0; top: 0;">{{ $item['value'] }}</li>
                                            @endforeach
                                            @endif
                                        </ul>
                                        <div class="w-100">
                                            <div class="custom-control custom-radio">
                                                <p class="mb-0 text-center">Upload</p>
                                                <input type="file" class="form-control" id="file-display" />
                                                <img alt="" @if(isset($val['file']) && $val['file']) src="{{ $val['file'] }}" @endif id="picture-display" style="width: 100%;height:100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 60px;text-align:center" for="">Youtube</label><input type="text" class="youtube form-control mb-2 ml-2" @if($val['type']=='Display' ) value="{{ $val['youtube'] ??'' }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='Display' ) value="{{ $val['score'] ??'' }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Thời Gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='Display' ) value="{{ $val['time'] ??'' }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-type @if($val['type'] == 'QR') d-block @else d-none @endif" id="qr">
                                <h4 class="text-center">QR</h4>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Gợi ý</label><input type="text" class="hint form-control mb-2 ml-2" @if($val['type']=='QR' ) value="{{ $val['hint'] ??'' }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Mã</label><input type="text" class="code form-control mb-2 ml-2" @if($val['type']=='QR' ) value="{{ $val['code'] ??'' }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='QR' ) value="{{ $val['score']??''  }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Thời gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='QR' ) value="{{ $val['time'] ??'' }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-type @if($val['type'] == 'Quizz') d-block @else d-none @endif" id="quizz">
                                <h4 class="text-center">Câu đố</h4>
                                <div class="p-2">
                                    <div class="d-flex">
                                        <ul id="sortable1" class="flex-grow-1 connectedSortable connectedSortable1 py-2 px-2 list-group border">
                                            @if($val['type'] == 'Quizz')
                                            @foreach($val['image'] ?? [] as $item)
                                            <li class="item-grab list-group-item ui-state-default text-break" data-id="{{ $item['id'] }}" style="position: relative; left: 0; top: 0;">{{ $item['value'] }}</li>
                                            @endforeach
                                            @endif
                                        </ul>
                                        <div class="w-100">
                                            <div class="custom-control custom-radio">
                                                <p class="mb-0 text-center">Upload</p>
                                                <input type="file" class="form-control" id="file-quizz" />
                                                <img alt="" @if( isset($val['file']) && $val['file']) src="{{ $val['file'] }}" @endif id="picture-quizz" style="width: 100%;height:100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column px-2">
                                    <input type="text" placeholder="Question" class="form-control mb-2" name="question" @if($val['type']=='Quizz' ) value="{{ $val['question'] }}" @endif>
                                    <div class="form-check answer">
                                        <input type="radio" class="form-check-input" value="1" id="customCheck1" name="answer" @if($val['type']=='Quizz' && $val['answer']==1) checked @endif>
                                        <input type="text" name="textAnser1" id="" class="answerText form-control" @if($val['type']=='Quizz' ) value="{{ $val['ListOption'][0]['text'] ??'' }}" @endif>
                                    </div>
                                    <div class="form-check answer">
                                        <input type="radio" class="form-check-input" value="2" id="customCheck2" name="answer" @if($val['type']=='Quizz' && $val['answer']==2) checked @endif>
                                        <input type="text" name="textAnser2" id="" class="answerText form-control" @if($val['type']=='Quizz' ) value="{{ $val['ListOption'][1]['text'] ??'' }}" @endif>
                                    </div>
                                    <div class="form-check answer">
                                        <input type="radio" class="form-check-input" value="3" id="customCheck3" name="answer" @if($val['type']=='Quizz' && $val['answer']==3) checked @endif>
                                        <input type="text" name="textAnser3" id="" class="answerText form-control" @if($val['type']=='Quizz' ) value="{{ $val['ListOption'][2]['text']??''  }}" @endif>
                                    </div>
                                    <div class="form-check answer">
                                        <input type="radio" class="form-check-input" value="4" id="customCheck4" name="answer" @if($val['type']=='Quizz' && $val['answer']==4) checked @endif>
                                        <input type="text" name="textAnser4" id="" class="answerText form-control" @if($val['type']=='Quizz' ) value="{{ $val['ListOption'][3]['text']??'' }}" @endif>
                                    </div>
                                </div>
                                <div class="p-2 d-flex">
                                    <div class="d-flex flex-1 align-items-center pr-3">
                                        <label for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" name="score" @if($val['type']=='Quizz' ) value="{{ $val['score'] ??'' }}" @endif>
                                    </div>
                                    <div class="d-flex flex-1 align-items-center pl-3">
                                        <label for="">Thời Gian</label><input type="number" class="time form-control mb-2 ml-2" name="time" @if($val['type']=='Quizz' ) value="{{ $val['time']??''  }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-type @if($val['type'] == 'Audio') d-block @else d-none @endif" id="audio">
                                <h4 class="text-center">Ghi Âm</h4>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Gợi ý</label><input type="text" class="suggest_audio form-control mb-2 ml-2" @if($val['type']=='Audio' ) value="{{ $val['hint']??'' }}" @endif>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='Audio' ) value="{{ $val['score']??'' }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Thời Gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='Audio' ) value="{{ $val['time']??'' }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-type @if($val['type'] == 'Picture') d-block @else d-none @endif" id="picture">
                                <h4 class="text-center">Chụp Hình</h4>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Gợi ý</label><input type="text" class="suggest_picture form-control mb-2 ml-2" @if($val['type']=='Picture' ) value="{{ $val['hint']??'' }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='Picture' ) value="{{ $val['score']??'' }}" @endif>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 40px;text-align:center" for="">Thời Gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='Picture' ) value="{{ $val['time']??'' }}" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 5px;position: relative">
                        <div class="hr-vertical"></div>
                    </div>
                    <ul id="sortable2" class="connectedSortable py-2 px-2 list-group">
                    </ul>
                    <div id="tree"></div>
                </div>
                <div class="d-flex justify-content-center py-2">
                    <button class="btn btn-secondary btn-sm w-60 delete-step" data-id="step1">Xóa</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
    <div class="stepquest-footer mt-3 d-flex justify-content-end">
        <button class="btn btn-secondary btn-sm w-80">Đặt lại</button>
        <button class="btn btn-primary btn-sm w-80" id="save">Lưu</button>
    </div>
</div>
<!-- <div class="card">
    <div class="card-body">
        <div class="d-flex border border-primary">
            <div class="flex-grow-1 border-left border-secondary">
                <div class="height-41 border-bottom border-secondary"></div>
                <div class="h-m-600">
                    <div class="d-flex px-4">
                        <div class="text-left w-110 font-500">Số bước</div>
                        <div class="flex-grow-1">
                            <ul class="tab" id="step-number">
                                <li class="step-number"><a href="#" class="tablinks active" onclick="chooseStep(event, 'info')">Thông tin</a></li>
                                @foreach($stepquest['items'] as $key =>$val)
                                <li class="step-number">
                                    <a href="#" class="tablinks" onclick="chooseStep(event, 'step{{ $key+1 }}'  )">{{ $key+1 }}</a>
                                </li>
                                @endforeach
                                <li class="create-step font-weight-bold"><a href="#" id="new-step" class="tablinks ">+</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-4" id="steps">
                        <div class="border border-secondary step" id="info">
                            <form id="main-form">
                                <div class="d-flex mb-2 px-4 py-1">
                                    <div class="text-left w-110 font-500">Tiêu đề</div>
                                    <div class="flex-grow-1">
                                        <input type="text" class="w-100 bg-color form-control" name="title" placeholder="Nhap Tieu De" value="{{ $stepquest['title']?? '' }}">
                                    </div>
                                </div>
                                <div class="d-flex mb-2 px-4 py-1">
                                    <div class="text-left w-110 font-500">Mô tả</div>
                                    <div class="flex-grow-1">
                                        <textarea class="w-100 bg-color no-resize form-control" name="des" rows="3">{{ $stepquest['des'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @foreach($stepquest['items'] as $key => $val)
                        <div class="border border-secondary step d-none" data-id="{{ $key+1 }}" id="step{{$key+1}}">
                            <input type="hidden" id="key" value="{{ $val['key'] }}">
                            <form>
                                <div class="main-block d-flex justify-content-between border-bottom border-secondary">
                                    <div class="flex-grow-1 w-75 d-flex" style="position: relative">
                                        <div>
                                            <ul class="tab tab-type mt-2" style="min-width: 550px;">
                                                <li><a href="#" @if($val['type']=='Display' ) class="active" @endif onclick="chooseType(event, 'display')">Hiển
                                                        thị</a></li>
                                                <li><a href="#" @if($val['type']=='QR' ) class="active" @endif onclick="chooseType(event, 'qr')">QR</a></li>
                                                <li><a href="#" @if($val['type']=='Quizz' ) class="active" @endif onclick="chooseType(event, 'quizz')">Câu đố</a></li>
                                                <li><a href="#" @if($val['type']=='Audio' ) class="active" @endif onclick="chooseType(event, 'audio')">Âm thanh</a></li>
                                                <li><a href="#" @if($val['type']=='Picture' ) class="active" @endif onclick="chooseType(event, 'picture')">Hình ảnh</a>
                                                </li>
                                            </ul>
                                            <div class="main-data">
                                                <div class="wrap-type @if($val['type'] == 'Display') d-block @else d-none @endif" id="display">
                                                    <h4 class="text-center">Hiển thị</h4>
                                                    <div class="p-2">
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Gợi ý</label>
                                                            <input type="text" class="suggest form-control mb-2 ml-2" @if($val['type']=='Display' ) value="{{ $val['title'] ??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Mô tả</label><textarea class="description form-control mb-2 ml-2">@if($val['type'] == 'Display') {{ $val['description']??''  }} @endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="p-2">
                                                        <div class="d-flex">
                                                            <ul id="sortable1" class="connectedSortable py-2 px-2 list-group border">
                                                                @if($val['type'] == 'Display')
                                                                @foreach($val['image'] ?? [] as $item)
                                                                <li class="item-grab list-group-item ui-state-default text-break" data-id="{{ $item['id'] }}" style="position: relative; left: 0; top: 0;">{{ $item['value'] }}</li>
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                            <div class="w-100">
                                                                <div class="custom-control custom-radio">
                                                                    <p class="mb-0 text-center">Upload</p>
                                                                    <input type="file" class="form-control" id="file-display" />
                                                                    <img alt="" @if(isset($val['file']) && $val['file']) src="{{ $val['file'] }}" @endif id="picture-display" style="width: 100%;height:100%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-2">
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 60px;text-align:center" for="">Youtube</label><input type="text" class="youtube form-control mb-2 ml-2" @if($val['type']=='Display' ) value="{{ $val['youtube'] ??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='Display' ) value="{{ $val['score'] ??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Thời Gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='Display' ) value="{{ $val['time'] ??'' }}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-type @if($val['type'] == 'QR') d-block @else d-none @endif" id="qr">
                                                    <h4 class="text-center">Quét QR</h4>
                                                    <div class="p-2">
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Gợi ý</label><input type="text" class="hint form-control mb-2 ml-2" @if($val['type']=='QR' ) value="{{ $val['hint'] ??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Mã</label><input type="text" class="code form-control mb-2 ml-2" @if($val['type']=='QR' ) value="{{ $val['code'] ??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='QR' ) value="{{ $val['score']??''  }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Thời gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='QR' ) value="{{ $val['time'] ??'' }}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-type @if($val['type'] == 'Quizz') d-block @else d-none @endif" id="quizz">
                                                    <h4 class="text-center">Câu đố</h4>
                                                    <div class="p-2">
                                                        <div class="d-flex">
                                                            <ul id="sortable1" class="connectedSortable py-2 px-2 list-group border">
                                                                @if($val['type'] == 'Quizz')
                                                                @foreach($val['image'] ?? [] as $item)
                                                                <li class="item-grab list-group-item ui-state-default text-break" data-id="{{ $item['id'] }}" style="position: relative; left: 0; top: 0;">{{ $item['value'] }}</li>
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                            <div class="w-100">
                                                                <div class="custom-control custom-radio">
                                                                    <p class="mb-0 text-center">Upload</p>
                                                                    <input type="file" class="form-control" id="file-quizz" />
                                                                    <img alt="" @if( isset($val['file']) && $val['file']) src="{{ $val['file'] }}" @endif id="picture-quizz" style="width: 100%;height:100%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column px-2">
                                                        <div>
                                                            <input type="text" placeholder="Question" class="form-control mb-2" name="question" @if($val['type']=='Quizz' ) value="{{ $val['question'] }}" @endif>
                                                            <div class="form-check mb-1 answer">
                                                                <input type="radio" class="form-check-input" value="1" id="customCheck1" name="answer" @if($val['type']=='Quizz' && $val['answer']==1) checked @endif>
                                                                <input type="text" name="textAnser1" id="" class="answerText form-control" @if($val['type']=='Quizz' ) value="{{ $val['ListOption'][0]['text'] ??'' }}" @endif>
                                                            </div>
                                                            <div class="form-check mb-1 answer">
                                                                <input type="radio" class="form-check-input" value="2" id="customCheck2" name="answer" @if($val['type']=='Quizz' && $val['answer']==2) checked @endif>
                                                                <input type="text" name="textAnser2" id="" class="answerText form-control" @if($val['type']=='Quizz' ) value="{{ $val['ListOption'][1]['text'] ??'' }}" @endif>
                                                            </div>
                                                            <div class="form-check mb-1 answer">
                                                                <input type="radio" class="form-check-input" value="3" id="customCheck3" name="answer" @if($val['type']=='Quizz' && $val['answer']==3) checked @endif>
                                                                <input type="text" name="textAnser3" id="" class="answerText form-control" @if($val['type']=='Quizz' ) value="{{ $val['ListOption'][2]['text']??''  }}" @endif>
                                                            </div>
                                                            <div class="form-check mb-1 answer">
                                                                <input type="radio" class="form-check-input" value="4" id="customCheck4" name="answer" @if($val['type']=='Quizz' && $val['answer']==4) checked @endif>
                                                                <input type="text" name="textAnser4" id="" class="answerText form-control" @if($val['type']=='Quizz' ) value="{{ $val['ListOption'][3]['text']??'' }}" @endif>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-2">
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='Quizz' ) value="{{ $val['score'] ??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Thời Gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='Quizz' ) value="{{ $val['time']??''  }}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-type @if($val['type'] == 'Audio') d-block @else d-none @endif" id="audio">
                                                    <h4 class="text-center">Ghi Âm</h4>
                                                    <div class="p-2">
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Gợi ý</label><input type="text" class="suggest_audio form-control mb-2 ml-2" @if($val['type']=='Audio' ) value="{{ $val['hint']??'' }}" @endif>
                                                        </div>
                                                    </div>
                                                    <div class="p-2">
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='Audio' ) value="{{ $val['score']??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Thời Gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='Audio' ) value="{{ $val['time']??'' }}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-type @if($val['type'] == 'Picture') d-block @else d-none @endif" id="picture">
                                                    <h4 class="text-center">Chụp Hình</h4>
                                                    <div class="p-2">
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Gợi ý</label><input type="text" class="suggest_picture form-control mb-2 ml-2" @if($val['type']=='Picture' ) value="{{ $val['hint']??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2" @if($val['type']=='Picture' ) value="{{ $val['score']??'' }}" @endif>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <label style="min-width: 40px;text-align:center" for="">Thời Gian</label><input type="number" class="time form-control mb-2 ml-2" @if($val['type']=='Picture' ) value="{{ $val['time']??'' }}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width: 5px;position: relative">
                                            <div class="hr-vertical"></div>
                                        </div>
                                        <ul id="sortable2" class="connectedSortable py-2 px-2 list-group">
                                        </ul>
                                        <div id="tree"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center py-2">
                                    <button class="btn btn-secondary btn-sm w-60 delete-step" data-id="step1">Xóa</button>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <div class="px-4 py-2 d-flex justify-content-end">
                        <div class="px-2">
                            <button class="btn btn-secondary btn-sm w-60" id="save">Lưu</button>
                        </div>
                        <div class="px-2">
                            <button class="btn btn-secondary btn-sm w-60">Đặt lại</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@stop

@section('scripts')
<script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
<script>
    (function() {
        $.ajax({
            url: "{{ route('stepquest-edit.tree-folder') }}",
            success: function(res) {
                let data = JSON.parse(res);
                let max = "{{ count($stepquest['items'] ) }}"
                for (let i = 1; i <= Number(max); i++) {
                    $(`#step${i} #tree`).treeview({
                        data: data,
                        levels: 10,
                    }).on('nodeSelected', function(event, data) {
                        console.log(i)
                        showItem(data.id, i);
                    });
                    $(`#step${i} #sortable1, #sortable2`).sortable({
                        connectWith: ".connectedSortable",
                        cursor: "grabbing"
                    }).disableSelection();
                }
            },
            error: function() {}
        });
    })()

    function chooseType(e, type) {
        e.preventDefault();
        $(e.target).closest('.main-block')
            .find('.tab-type li a')
            .removeClass('active');
        $(event.target).addClass('active');
        $(e.target).closest('.main-block')
            .find('.wrap-type')
            .addClass('d-none')
            .removeClass('d-block');
        $(e.target).closest(`.main-block`)
            .find(`#${type}`)
            .removeClass('d-none');
    }

    function chooseStep(e, step) {
        e.preventDefault();
        $('#steps .step').addClass('d-none');
        $(`#${step}`).removeClass('d-none');
        $('#step-number .tablinks').removeClass('active');
        $(e.target).addClass('active');
    }

    function showItem(donViId, stepNumber = 1) {
        $.ajax({
            url: "{{ route('stepquest-edit.image') }}",
            data: {
                donVi: donViId
            },
            success: (response) => {
                const ungdung = JSON.parse(response);
                if (ungdung.length == 0) {
                    $(`#step${stepNumber} #sortable2`)
                        .empty()
                        .append(`No Data`);
                } else {
                    $(`#step${stepNumber} #sortable2`)
                        .empty()
                        .append(JSON.parse(response).map((item, index) => (
                            `<li class="item-grab list-group-item ui-state-default text-break" data-id="${item.id}">${item.title}</li>`
                        )));
                }
            }
        });
    }

    $(document).on('click', '#step-number #new-step', function(e) {
        e.preventDefault();
        const currentStepsText = $('#step-number li:not(:first-child):not(:last-child)').length;
        const currentSteps = Number($('#steps .step:last-child').attr('data-id'));
        $('#step-number .step-number .tablinks')
            .removeClass('active');
        $(`<li class="step-number">
				<a href="#" class="tablinks active" onclick="chooseStep(event, 'step${currentSteps + 1}')">${currentStepsText + 1}
				</a>
				</li>`)
            .insertAfter('.step-number:last');
        $(`#steps .step`).addClass('d-none');
        const html = `<div class="border border-secondary step" data-id="${currentSteps + 1}" id="step${currentSteps + 1}"><form>${$(`#step1`).html()}</form><div>`;
        const element = $(html);
        element.find('.delete-step').removeAttr('data-id').attr('data-id', `step${currentSteps + 1}`);
        element.find('input:not([name=answer])').val('');
        element.find('textarea').val('');
        element.find('.tab-type li a').removeClass('active');
        element.find('.tab-type li:first-child a').addClass('active');
        element.find('input[name=answer]').attr('checked', false)
        element.find('.wrap-type').addClass('d-none');
        element.find('.wrap-type:first-child').removeClass('d-none');
        element.find('#sortable2, #sortable1').empty();
        element.find('.answer-box').removeClass('border border-danger');
        element.find('.answer-box').find('.error-answer').addClass('d-none').text('');
        element.find('#picture-display').removeAttr('src');
        element.find('#picture-quizz').removeAttr('src');
        element.appendTo('#steps');
        $.ajax({
            url: "{{ route('stepquest-edit.tree-folder') }}",
            success: function(res) {
                let data = JSON.parse(res);
                $(`#step${currentSteps + 1} #tree`).treeview({
                    data: data,
                    levels: 10,
                }).on('nodeSelected', function(event, data) {
                    showItem(data.id, currentSteps + 1);
                });
            },
            error: function() {}
        });

        $(`#step${currentSteps + 1} #sortable1, #sortable2`).sortable({
            connectWith: ".connectedSortable",
            cursor: "grabbing",
        }).disableSelection();

        $(document).on('change', `#step${currentSteps + 1} #file-quizz`, async function() {
            $(`#step${currentSteps + 1} #picture-quizz`).attr('src', URL.createObjectURL(this.files[this.files.length - 1]))
        });
        $(document).on('change', `#step${currentSteps + 1} #file-display`, async function() {
            $(`#step${currentSteps + 1} #picture-display`).attr('src', URL.createObjectURL(this.files[this.files.length - 1]))
        });
    });

    $(document).on('click', '.delete-step', function(e) {
        const currentSteps = $('#step-number li').length - 1;
        if (Number(currentSteps) == 2) {
            alert('Can not delete');
            return false;
        }
        e.preventDefault();
        $('#step-number').find('.step-number .active')
            .closest('li')
            .nextAll()
            .get()
            .forEach(function(element) {
                if (!$(element).hasClass('create-step')) {
                    $(element).find('a').text(Number($(element).text()) - 1);
                }
            });
        $('#step-number').find('.step-number .active').closest('li').remove();
        $('#step-number').find('.step-number:first-child .tablinks').addClass('active');
        $(`#${$(this).data('id')}`).remove();
        $('#steps').find('.step:first-child').removeClass('d-none');
    });

    $(document).on('click', '#reset', function(e) {
        e.preventDefault();
        $('#steps .step:nth-child(2)').removeClass('d-none');
        $('#steps .step:not(:first-child):not(#step1)').remove();
        $('#step-number .step-number:nth-child(2) .tablinks').addClass('active');
        $('#step-number .step-number:not(:first-child):not(:nth-child(2))').remove();
    })

    $(document).on('click', '#save', function(e) {
        e.preventDefault();
        const items = [];
        let validData = true;
        let formData = new FormData();
        $('#main-form').serializeArray().forEach(function({
            name,
            value
        }, index) {
            formData.append(name, value.replace(/"/g, "'"));
        });
        $('#steps').find('.step:not(:first-child)')
            .get().forEach(function(item, index) {
                let step = $(item).find('.main-block .main-data .wrap-type:not(.d-none)').get();
                const type = $(step).attr('id');
                switch (type) {
                    case 'display': {
                        formData.append(`items[${index}][index]`, index);
                        formData.append(`items[${index}][type]`, 'Display');
                        formData.append(`items[${index}][title]`, $(step).find('.suggest').val().replace(/"/g, "'"));
                        formData.append(`items[${index}][description]`, $(step).find('.description').val().replace(/"/g, "'"));
                        formData.append(`items[${index}][youtube]`, $(step).find('.youtube').val().replace(/"/g, "'"));
                        if ($(step).find('#file-display')[0].files[0])
                            formData.append(`${index}`, $(step).find('#file-display')[0].files[0]);
                        break;
                    }
                    case 'qr': {
                        formData.append(`items[${index}][index]`, index);
                        formData.append(`items[${index}][type]`, 'QR');
                        formData.append(`items[${index}][hint]`, $(step).find('.hint').val().replace(/"/g, "'"));
                        formData.append(`items[${index}][code]`, $(step).find('.code').val().replace(/"/g, "'"));
                        break;
                    }
                    case 'quizz': {
                        let answer = $(step).find('input[name=answer]').filter(':checked').first().val();
                        if ($(step).find('#file-quizz')[0].files[0])
                            formData.append(`${index}`, $(step).find('#file-quizz')[0].files[0]);
                        formData.append(`items[${index}][index]`, index);
                        formData.append(`items[${index}][type]`, 'Quizz');
                        formData.append(`items[${index}][question]`, $(step).find('input[name=question]').val().replace(/"/g, "'"));
                        formData.append(`items[${index}][answer]`, $(step).find('input[name=answer]').filter(':checked').first().val());
                        $(item).find('.answer .answerText').get().forEach(function(item, i) {
                            formData.append(`items[${index}][ListOption][${i}][id]`, i + 1);
                            formData.append(`items[${index}][ListOption][${i}][text]`, $(item).val().replace(/"/g, "'"));
                        });
                        if (answer) {
                            $(step).find('.answer-box').removeClass('border border-danger');
                            $(step).find('.answer-box').find('.error-answer').addClass('d-none').text('');
                            validData = true;
                        } else {
                            $(step).find('.answer-box').addClass('border border-danger');
                            $(step).find('.answer-box').find('.error-answer').removeClass('d-none').text('Chọn câu trả lời');
                            validData = false;
                        }
                        break;
                    }
                    case 'audio': {
                        formData.append(`items[${index}][index]`, index);
                        formData.append(`items[${index}][type]`, 'Audio');
                        formData.append(`items[${index}][hint]`, $(step).find('.suggest_audio').val().replace(/"/g, "'"));
                        break;
                    }
                    case 'picture': {
                        formData.append(`items[${index}][index]`, index);
                        formData.append(`items[${index}][type]`, 'Picture');
                        formData.append(`items[${index}][hint]`, $(step).find('.suggest_picture').val().replace(/"/g, "'"));
                        break;
                    }
                }
                formData.append(`items[${index}][key]`, $(item).find('#key').first().val() ?? Date.now());
                formData.append(`items[${index}][score]`, $(step).find('.score').first().val().replace(/"/g, "'"));
                formData.append(`items[${index}][time]`, $(step).find('.time').first().val().replace(/"/g, "'"));
                $(step).find('#sortable1 li').each(function(i, el) {
                    formData.append(`items[${index}][image][${i}][id]`, Number($(el).attr('data-id')));
                    formData.append(`items[${index}][image][${i}][value]`, $(el).text().replace(/"/g, "'"));
                });
            });
        if (validData) {
            $.ajax({
                url: "{{ route('stepquest-edit.update', $id) }}",
                type: 'post',
                contentType: false,
                processData: false,
                data: formData,
                success: function(href) {
                    window.location.href = href
                },
                error: function(res) {
                    alert('error');
                }
            });
        }
    });
</script>
@endsection

@section('styles')
<style>
    #main {
        display: inline-block;
        text-align: left;
        margin: 20px auto;
        background: #fff;
        width: 100%;
        padding: 20px 30px 70px;
        border-top: 1px solid #e6e6df;
        border-right: 1px solid #e6e6df;
        border-bottom: 5px solid #e6e6df;
        border-left: 1px solid #e6e6df;
    }

    .stepquest-container {
        margin: -20px 0 0 0;
        height: calc(100vh-75px);
        padding: 16px;
        display: flex;
        flex-direction: column;
    }

    .stepquest-header {
        height: fit-content;
        min-height: fit-content;
    }

    .stepquest-content {
        height: 100%;
        padding: 20px;
        overflow: auto;
    }

    .stepquest-footer {
        height: 40px;
        min-height: fit-content;
    }

    .main-block {
        /* display: flex; */
        min-height: calc(100%-36px);
    }

    ul.tab {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        min-width: 60px;
    }

    ul.tab li {
        float: left;
        background-color: #f1f1f1;
        /* margin-left: 10px; */
        height: 40px;
    }

    .active {
        margin-left: 0;
        border: 1px solid black;
        border-bottom: none;
    }

    ul.tab li a {
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
        text-align: center;
        padding: 0px 16px;
        text-decoration: none;
        transition: 0.3s;
        font-size: 17px;
        min-width: 68px;
        border: 1px solid #f1f1f1;
        border-bottom: none;
        height: 100%;
    }

    ul.tab li a:hover {
        background-color: #ddd;
    }

    ul.tab li a.active {
        margin-left: 0;
        border: 1px solid #179970;
        border-bottom: none;
        color: #179970;
        background-color: #fff;
        font-weight: bold;
    }

    .step {
        height: calc(100%-8px);
    }

    .main-data label {
        min-width: 96px;
    }

    .main-data .wrap-type .form-check {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin: 4px 0;
    }

    .main-data .wrap-type input[type="radio"] {
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    .main-data .wrap-type .question-attachment {
        height: 40px;
        border: 1px dashed #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        cursor: pointer;
    }

    .main-data .wrap-type .question-attachment:hover {
        border: 1px dashed #179970;
    }

    .main-data .wrap-type input[type="text"].answerText {
        margin-left: 8px;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
    }

    .tabcontent:first-child {
        display: block;
    }

    .height-41 {
        height: 41px;
    }

    .w-110 {
        width: 110px;
    }

    .font-500 {
        font-weight: 500;
    }

    .w-80 {
        width: 80px;
    }

    .bg-color {
        background-color: #e7e9eb;
    }

    .no-resize {
        resize: none;
    }

    .no-underline {
        text-decoration: none;
        color: black;
    }

    .no-underline:hover {
        text-decoration: none;
        color: black;
    }

    .h-m-600 {
        min-height: 700px;
    }

    .tab-type .active {
        border: 1px solid black !important;
    }

    .tab-type li a {
        min-width: 80px;
    }

    .connectedSortable {
        width: 100%;
        min-height: 160px;
    }

    .hr-vertical {
        border-left: 1px solid grey;
        height: 100%;
        position: absolute;
        left: 64%;
        margin-left: -3px;
        top: 0;
    }

    .item-grab {
        cursor: grab;
        background: #8abeb7;
    }

    #tree ul {
        max-width: 400px;
        max-height: 700px;
        overflow-y: auto;
    }

    .flex {
        display: flex;
    }

    .box {
        flex: 1;
    }

    .box1 {
        display: flex;
    }

    .btn {
        margin: 0 5px;
    }
</style>
@stop