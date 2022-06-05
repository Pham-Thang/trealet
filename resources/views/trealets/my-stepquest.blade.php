@extends('layouts.app')

@section('page-title', 'StepQuest Edit')
@section('page-heading', 'StepQuest Edit')

@section('breadcrumbs')
<li class="breadcrumb-item active">
    You can edit your stepquest trealet here
</li>
@stop

@section('content')
<div class="stepquest-composer-container">
    <div class="stepquest-composer__header">
        <div class="header__list">
            <div class="border-left"></div>
            <ul class="tab" id="step-number">
                <li class="step-number info-tab"><div tabindex="1" class="tablinks active" onclick="chooseStep(event, 'info')">Thông tin</div></li>
                <li class="step-number"><div tabindex="1" class="tablinks" onclick="chooseStep(event, 'step1')">
                    Câu 1
                    <div class="question--toolbar">
                        <button class="btn btn-secondary btn-circle delete-step" data-id="step1">
                            Xóa
                        </button>
                    </div>
                </div></li>
                <li class="create-step font-weight-bold"><div title="Thêm câu" id="new-step" class="tablinks ">+</div></li>
            </ul>
        </div>
        <div class="header__button">
            <div class="">
                <button class="btn btn-primary btn-sm w-90" id="save">Lưu</button>
            </div>
            <div class="">
                <button class="btn btn-secondary btn-sm w-90" id="reset">Đặt lại</button>
            </div>
        </div>
    </div>
    <div class="stepquest-composer__content" id="steps">
        
        <div class="step p-4" id="info">
            <form id="main-form">
                <div class="d-flex mb-2 py-1">
                    <div class="text-left w-110 font-500">Tiêu đề</div>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100 form-control" name="title" placeholder="Nhập tiêu đề">
                    </div>
                </div>
                <div class="d-flex mb-2 py-1">
                    <div class="text-left w-110 font-500">Mô tả</div>
                    <div class="flex-grow-1">
                        <textarea class="w-100 no-resize form-control" name="des" rows="3"  placeholder="Nhập mô tả"></textarea>
                    </div>
                </div>
                <div class="d-flex mb-2 py-1">
                    <div class="text-left w-110 font-500">Điểm số tối thiểu để nhận thưởng</div>
                    <div class="flex-grow-1">
                        <input type="number" class="w-100 form-control" name="minScore" placeholder="Nhập số điểm">
                    </div>
                </div>
                <div class="d-flex mb-2 py-1">
                    <div class="text-left w-110 font-500">Phần thưởng</div>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100 form-control" name="gift" placeholder="Nhập phần thưởng">
                    </div>
                </div>
            </form>
        </div>
        <div class="step d-none h-full" data-id="1" id="step1">
            <form class="h-full">
                <div class="flex-grow-1 d-flex main-block d-flex justify-content-between h-full" style="position: relative">
                    <div class="flex-grow-1 overflow-y-auto form-wrap">
                        <ul class="tab tab-type my-1" style="min-width: 550px;">
                            <li><div href="#" class="active" onclick="chooseType(event, 'display')">Hiển thị</div></li>
                            <li><div href="#" onclick="chooseType(event, 'qr')">Quét QR</div></li>
                            <li><div href="#" onclick="chooseType(event, 'quizz')">Câu Đố</div></li>
                            <li><div href="#" onclick="chooseType(event, 'audio')">Ghi Âm</div></li>
                            <li><div href="#" onclick="chooseType(event, 'picture')">Chụp Hình</div></li>
                        </ul>
                        <div class="main-data">
                            <div class="wrap-type" id="display">
                                <h4 class="text-center">Hiển thị</h4>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 60px;text-align:center" for="">Gợi ý</label><input type="text" class="suggest form-control mb-2 ml-2">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 60px;text-align:center" for="">Mô tả</label><textarea class="description form-control mb-2 ml-2"></textarea>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="d-flex">
                                        <ul id="sortable1" class="flex-grow-1 connectedSortable connectedSortable1 py-2 px-2 list-group border" title="Kéo ảnh">
                                        </ul>
                                        <div class="w-100">
                                            <div class="custom-control custom-radio">
                                                <label class="upload-field upload-field-label" for="upload-field">Upload</label>
                                                <input type="file" class="form-control d-none upload-field-input" id="upload-field" />
                                                <img alt="" class="upload-field-preview" id="file-preview" style="width: 100%;height:100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 60px;text-align:center" for="">Youtube</label><input type="text" class="youtube form-control mb-2 ml-2">
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-type d-none" id="qr">
                                <h4 class="text-center">Quét QR</h4>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 60px;text-align:center" for="">Gợi ý</label><input type="text" class="hint form-control mb-2 ml-2">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 60px;text-align:center" for="">Mã</label><input type="text" class="code form-control mb-2 ml-2">
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-type d-none" id="quizz">
                                <h4 class="text-center">Câu đố</h4>
                                <div class="p-2">
                                    <div class="d-flex">
                                        <ul id="sortable1" class="flex-grow-1 connectedSortable connectedSortable1 py-2 px-2 list-group border">
                                        </ul>
                                        <div class="w-100">
                                            <div class="custom-control custom-radio">
                                                <label class="upload-field upload-field-label" for="upload-field">Upload</label>
                                                <input type="file" class="form-control d-none upload-field-input" id="upload-field" />
                                                <img class="upload-field-preview" alt="" id="file-preview" style="width: 100%;height:100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column px-2">
                                    <div class="answer-box">
                                        <div class="d-flex align-items-center">
                                            <label style="min-width: 60px;text-align:center" for="">Câu hỏi</label>
                                            <input type="text" placeholder="Question" class="form-control mb-2" name="question">
                                        </div>
                                        <div class="form-check mb-1 answer d-flex align-items-center">
                                            <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="1" name="answer">
                                            <input type="text" name="textAnser1" id="" class="answerText form-control">
                                            <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                                                Xóa
                                            </button>
                                        </div>
                                        <div class="form-check mb-1 answer d-flex align-items-center">
                                            <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="2" name="answer">
                                            <input type="text" name="textAnser2" id="" class="answerText form-control">
                                            <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                                                Xóa
                                            </button>
                                        </div>
                                        <div class="form-check mb-1 answer d-flex align-items-center">
                                            <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="3" name="answer">
                                            <input type="text" name="textAnser3" id="" class="answerText form-control">
                                            <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                                                Xóa
                                            </button>
                                        </div>
                                        <div class="form-check mb-1 answer d-flex align-items-center">
                                            <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="4" name="answer">
                                            <input type="text" name="textAnser4" id="" class="answerText form-control">
                                            <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                                                Xóa
                                            </button>
                                        </div>
                                        <div class="form-check mb-1 answer">
                                            <div class="add-answer" onclick="addAnswer(event)">
                                                Thêm câu trả lời
                                            </div>
                                        </div>
                                        <p class="text-danger error-answer d-none mb-0"></p>
                                    </div>
                                    <div class="d-flex align-items-center mt-3">
                                        <label style="min-width: 60px;text-align:center" for="">Giải thích</label>
                                        <input type="text" class="hint form-control mb-2 ml-2">
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-type d-none" id="audio">
                                <h4 class="text-center">Ghi Âm</h4>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 60px;text-align:center" for="">Gợi ý</label><input type="text" class="suggest_audio form-control mb-2 ml-2">
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-type d-none" id="picture">
                                <h4 class="text-center">Chụp Hình</h4>
                                <div class="p-2">
                                    <div class="d-flex align-items-center">
                                        <label style="min-width: 60px;text-align:center" for="">Gợi ý</label><input type="text" class="suggest_picture form-control mb-2 ml-2">
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="d-flex align-items-center">
                                    <label style="min-width: 60px;text-align:center" for="">Điểm</label><input type="number" class="score form-control mb-2 ml-2">
                                </div>
                                <div class="d-flex align-items-center">
                                    <label style="min-width: 60px;text-align:center" for="">Thời Gian</label>
                                    <div>
                                        <div class="d-flex py-1 pl-2">
                                            <input type="checkbox" class="form-control isUnlimitedTime" onchange="onChangeTimeLimit(event)">
                                            <span class="pl-2" style="line-height: 16px;">Không giới hạn thời gian</span>
                                        </div>
                                        <input type="number" class="time form-control mb-2 ml-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 5px;position: relative">
                        <div class="hr-vertical"></div>
                    </div>
                    <ul id="sortable2" class="connectedSortable connectedSortable2 py-2 px-2 list-group overflow-y-auto">
                    </ul>
                    <div id="tree"></div>
                </div>
            </form>
        </div>
    </div>
</div>
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
                $('#tree').treeview({
                    data: data,
                    levels: 10,
                }).on('nodeSelected', function(event, data) {
                    showItem(data.id);
                });
            },
            error: function() {}
        });
        $("#step1 #sortable1, #sortable2").sortable({
            connectWith: ".connectedSortable",
            cursor: "grabbing"
        }).disableSelection();
    })()

    function showMessageBox (option) {
        option ??= {}
        return new Promise((resolve, reject) => {
            const div = document.createElement('div')
            const id = Math.random().toString().split('.').pop()
            div.setAttribute("id", id)
            div.innerHTML = `
                <div class="dialog">
                    <div class="dialog__modal"></div>
                    <div class="dialog__container">
                            <div class="dialog__title">${option.title}</div>    
                            <div class="dialog__content">${option.message}</div> 
                            <div class="dialog__footer">
                                ${!option.hideButtonCancel ? `<button class="btn-secondary">${option.buttonCancel}</button>` : ""} 
                                <button class="btn-primary">${option.buttonConfirm}</button> 
                            </div>  
                    </div>
                </div>
            `
            const close = (callback) => {
                $('body')[0].removeChild(div)
                callback && callback()
            }
            const eleButtonPrimary = div.querySelector('button.btn-primary')
            if (eleButtonPrimary) {
                eleButtonPrimary.onclick = () => close(() => resolve(true))
            }
            const eleButtonSecondary = div.querySelector('button.btn-secondary')
            if (eleButtonSecondary) {
                eleButtonSecondary.onclick = () => close(() => reject(true))
            }
            $('body')[0].appendChild(div)
        })
    }

    function chooseType(e, type) {
        e.preventDefault();
        $(e.target).closest('.main-block')
            .find('.tab-type li div')
            .removeClass('active');
        $(e.target).addClass('active');
        $(e.target).closest('.main-block')
            .find('.wrap-type')
            .addClass('d-none');
        $(e.target).closest(`.main-block`)
            .find(`#${type}`)
            .removeClass('d-none');
    }

    function chooseStep(e, step) {
        if (e.target.nodeName?.toLocaleLowerCase() === 'button') return 
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

    function onDeleteStep(e) {
        const currentSteps = $('#step-number li').length - 1;
        if (Number(currentSteps) == 2) {
            showMessageBox({
                title: 'Không thể xóa',
                message: `Không thể xóa câu. Bạn cần có ít nhất một câu.`,
                buttonConfirm: 'Đồng ý',
                hideButtonCancel: true,
            })
            return false;
        }
        showMessageBox({
            title: 'Xóa câu',
            message: `Bạn chắc chắn muốn xóa câu này?`,
            buttonConfirm: 'Xóa',
            buttonCancel: 'Hủy'
        }).then(res => {
            if (!res) return
            e.preventDefault();
            $('#step-number').find('.step-number .active').closest('li').nextAll().get().forEach(function(element) {
                if (!$(element).hasClass('create-step')) {
                    $(element).find('a').text(Number($(element).text()) - 1);
                }
            });
            $('#step-number').find('.step-number .active').closest('li').remove();
            $('#step-number').find('.step-number:first-child .tablinks').addClass('active');
            $(`#${$(this).data('id')}`).remove();
            $('#steps').find('.step:first-child').removeClass('d-none');
        }).catch(() => {})
    }

    function onChangeTimeLimit(e) {
        const timeInputEle = e.target.parentElement.parentElement.querySelector(".time")

        if (e.target.checked) {
            timeInputEle.value = ''
            timeInputEle.setAttribute("disabled", true)
        } else {
            timeInputEle.removeAttribute("disabled")
        }
    }

    function addAnswer(e) {
        const addAnswerContainerEle = e.target.parentElement

        $(
            `
            <div class="form-check mb-1 answer d-flex align-items-center">
                <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="1" name="answer">
                <input type="text" name="textAnswer" id="" class="answerText form-control">
                <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                    Xóa
                </button>
            </div>
            `
        ).insertBefore(addAnswerContainerEle)
    }

    function deleteAnswer(e) {
        e.target.parentElement.remove()
    }

    $(document).on('click', '#step-number #new-step', function(e) {
        e.preventDefault();
        const currentStepsText = $('#step-number li:not(:first-child):not(:last-child)').length;
        const currentSteps = Number($('#steps .step:last-child').attr('data-id'));
        $('#step-number .step-number .tablinks')
            .removeClass('active');
        $(`<li class="step-number">
				<div tabindex="1" class="tablinks active" onclick="chooseStep(event, 'step${currentSteps + 1}')">
                    Câu ${currentStepsText + 1}
                    <div class="question--toolbar">
                        <button class="btn btn-secondary btn-circle delete-step" data-id="step${currentStepsText + 1}" onclick="onDeleteStep">
                            Xóa
                        </button>
                    </div>
				</div>
				</li>`)
            .insertAfter('.step-number:last');
        let eleTab = $('ul.tab')[0]
        eleTab?.scrollTo({
            left: eleTab?.scrollWidth,
            behavior: 'smooth',
        })
        $(`#steps .step`).addClass('d-none');
        const html = `<div class="step" data-id="${currentSteps + 1}" id="step${currentSteps + 1}"><form class="h-full">${$(`#step1`).html()}</form><div>`;
        const element = $(html);
        element.find('.delete-step').removeAttr('data-id').attr('data-id', `step${currentSteps + 1}`);
        element.find('input:not([name=answer])').val('');
        element.find('textarea').val('');
        element.find('.tab-type li div').removeClass('active');
        element.find('.tab-type li:first-child div').addClass('active');
        element.find('input[name=answer]').attr('checked', false)
        element.find('.wrap-type').addClass('d-none');
        element.find('.wrap-type:first-child').removeClass('d-none');
        element.find('#sortable2, #sortable1').empty();
        element.find('.answer-box').removeClass('border border-danger');
        element.find('.answer-box').find('.error-answer').addClass('d-none').text('');
        element.find('.upload-field-preview').removeAttr('src');
        const newIdUploadField = Math.random().toString()
        element.find('.upload-field-input').attr('id', newIdUploadField)
        element.find('.upload-field-label').attr('for', newIdUploadField)
        element.find('.upload-field-preview').attr('id', newIdUploadField + '-preview')
        element.find('.isUnlimitedTime').removeAttr('checked')
        element.find('#quizz .answer-box').html(`
            <div class="d-flex align-items-center">
                <label style="min-width: 60px;text-align:center" for="">Câu hỏi</label>
                <input type="text" placeholder="Question" class="form-control mb-2" name="question">
            </div>
            <div class="form-check mb-1 answer d-flex align-items-center">
                <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="1" name="answer">
                <input type="text" name="textAnser1" id="" class="answerText form-control">
                <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                    Xóa
                </button>
            </div>
            <div class="form-check mb-1 answer d-flex align-items-center">
                <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="2" name="answer">
                <input type="text" name="textAnser2" id="" class="answerText form-control">
                <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                    Xóa
                </button>
            </div>
            <div class="form-check mb-1 answer d-flex align-items-center">
                <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="3" name="answer">
                <input type="text" name="textAnser3" id="" class="answerText form-control">
                <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                    Xóa
                </button>
            </div>
            <div class="form-check mb-1 answer d-flex align-items-center">
                <input type="radio" style="width: 16px; height: 16px;" class="form-check-input mr-2" value="4" name="answer">
                <input type="text" name="textAnser4" id="" class="answerText form-control">
                <button class="btn btn-secondary btn-circle ml-2" onclick="deleteAnswer(event)">
                    Xóa
                </button>
            </div>
            <div class="form-check mb-1 answer">
                <div class="add-answer" onclick="addAnswer(event)">
                    Thêm câu trả lời
                </div>
            </div>
            <p class="text-danger error-answer d-none mb-0"></p>
        `)
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

        $(document).on('change', `#step${currentSteps + 1} .upload-field-input`, async function() {
            $(`#step${currentSteps + 1} .upload-field-preview`).attr('src', URL.createObjectURL(this.files[this.files.length - 1]))
        });
    });

    $(document).on('click', '.delete-step', onDeleteStep);

    $(document).on('click', '#reset', function(e) {
        showMessageBox({
            title: 'Đặt lại',
            message: `Bạn chắc chắn muốn đặt lại tất cả các câu?`,
            buttonConfirm: 'Đồng ý',
            buttonCancel: 'Hủy'
        }).then(res => {
            if (!res) return
            e.preventDefault();
            $('#steps .step:nth-child(2)').removeClass('d-none');
            $('#steps .step:not(:first-child):not(#step1)').remove();
            $('#step-number .step-number:nth-child(2) .tablinks').addClass('active');
            $('#step-number .step-number:not(:first-child):not(:nth-child(2))').remove();
        }).catch(() => {})
    });

    $(document).on('click', 'input[name=answer]', function() {
        $(this).closest('.answer-box').removeClass('border border-danger');
        $(this).closest('.answer-box').find('.error-answer').addClass('d-none').text('');
    });

    $(document).on('change', '#step1 .upload-field-input', async function() {
        console.log(URL.createObjectURL(this.files[this.files.length - 1]));
        $('#step1 .upload-field-preview').attr('src', URL.createObjectURL(this.files[this.files.length - 1]))
    });

    function convertFileToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
        });
    }

    $(document).on('click', '#save', function(e) {
        const items = [];
        let validData = true;
        e.preventDefault();
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
                        formData.append(`${index}`, $(step).find('.upload-field-input')[0]?.files[0]);
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
                        const answersEle = $(step).find('input[name=answer]').get().forEach((ele, indexAnswer) => {
                            ele.value = (indexAnswer + 1) + '' 
                        })
                        const answer = $(step).find('input[name=answer]').filter(':checked').first().val()
                        formData.append(`${index}`, $(step).find('.field-upload-input')[0].files[0]);
                        formData.append(`items[${index}][index]`, index);
                        formData.append(`items[${index}][type]`, 'Quizz');
                        formData.append(`items[${index}][question]`, $(step).find('input[name=question]').val().replace(/"/g, "'"));
                        $(item).find('.answer .answerText').get().forEach(function(item, i) {
                            formData.append(`items[${index}][ListOption][${i}][id]`, i + 1);
                            formData.append(`items[${index}][ListOption][${i}][text]`, $(item).val().replace(/"/g, "'"));
                        });
                        formData.append(`items[${index}][answer]`, answer);
                        if (answer) {
                            $(step).find('.answer-box').removeClass('border border-danger');
                            $(step).find('.answer-box').find('.error-answer').addClass('d-none').text('');
                            validData = true;
                        } else {
                            $(step).find('.answer-box').addClass('border border-danger');
                            $(step).find('.answer-box').find('.error-answer').removeClass('d-none').text('Chọn câu trả lời');
                            validData = false;
                        }
                        formData.append(`items[${index}][hint]`, ($(step).find('.hint').first().val() || '').replace(/"/g, "'"));
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
                formData.append(`items[${index}][key]`, Date.now());
                formData.append(`items[${index}][score]`, $(step).parent().find('.score').first().val().replace(/"/g, "'"));
                formData.append(`items[${index}][time]`, ($(step).parent().find('.time').first().val() || '0').replace(/"/g, "'"));
                formData.append(`items[${index}][isUnlimitedTime]`, ($(step).parent().find('.isUnlimitedTime') || [])[0]?.checked || '');
                $(step).find('#sortable1 li').each(function(i, el) {
                    formData.append(`items[${index}][image][${i}][id]`, Number($(el).attr('data-id')));
                    formData.append(`items[${index}][image][${i}][value]`, $(el).text().replace(/"/g, "'"));
                });
            });

        if (validData) {
            $.ajax({
                url: "{{ route('stepquest-edit.upload') }}",
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

    .w-90 {
        width: 90px;
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

    .connectedSortable1 {
        min-height: 200px;
        width: 100%;
    }

    .connectedSortable2 {
        width: 30%;
        min-height: 200px;
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

    #tree {
        max-width: 300px;
    }

    #tree ul {
        max-width: 400px;
        max-height: 700px;
        overflow-y: auto;
    }

    .stepquest-composer-container {
        height: calc(100vh - 95px + 8px);
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 16px;
        padding: 0 16px 16px 16px;
        margin-top: -8px;
    }

    .stepquest-composer__header {
        height: 70px;
        min-height: 70px;
        width: 100%;
        display: flex;
        border: 10px;
        overflow: hidden;
        gap: 16px;
    }

    .stepquest-composer__content {
        height: 100%;
        width: 100%;
        border: 1px solid var(--primary);
        border-radius: 10px;
        overflow-y: auto;
        position: relative;
    }

    .stepquest-composer__content .step {
        height: 100%;
        overflow: hidden;
    }

    .stepquest-composer__content .step#info {
        height: fit-content;
    }

    .header__list {
        border: 10px;
        overflow: hidden;
        width: 100%;
        height: 100%;
        position: relative;
        padding-left: 92px;
        padding-right: 48px;
        border-radius: 10px;
        border: 1px solid var(--primary);
        display: flex
    }

    .header__button {
        height: 100%;
        width: 96px;
        min-width: 96px;
        padding: 4px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .border-left {
        border-left: 1px solid var(--primary);
        width: 1px;
        height: 75%;
        margin: auto 0;
    }

    ul.tab {
        display: flex;
        overflow-x: auto;
        height: 100%;
        padding: 8px 8px 8px 0;
        /* box-shadow: rgb(0 0 0 / 15%) 6px 0 6px inset, rgb(0 0 0 / 15%) -6px 0 6px inset; */
    }

    ul.tab li.step-number {
        height: 100%;
        background: none;
        position: relative;
    }

    ul.tab li.step-number .tablinks {
        height: 100%;
        width: 72px;
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        cursor: pointer;
        border: 2px solid #ccc;
        outline: none;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tablinks.active {
        border: 2px solid var(--primary) !important;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 8px 28px, rgba(0, 0, 0, 0.22) 0px 8px 10px;
    }

    .tablinks.active .question--toolbar {
        display: flex;
    }

    ul.tab li.info-tab {
        position: absolute;
        top: calc((100% - 52px)/2);
        left: 0;
        height: calc(100% - 12px);
    }

    ul.tab li.info-tab .tablinks {
        height: 52px;
    }

    .tablinks .question--toolbar {
        position: absolute;
        top: -8px;
        right: -8px;
        display: none;
    }

    ul.tab li.create-step {
        position: absolute;
        right: 10px;
        top: calc((100% - 32px)/2);
    }

    ul.tab li.create-step #new-step {
        background-color: var(--primary);
        color: var(--white);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .box-shadow {
        box-shadow: 0 0 8px 0 rgb(0 0 0 / 6%), 0 1px 0 0 rgb(0 0 0 / 2%)
    }

    ul.tab-type {
        height: fit-content;
        border: 6px;
        overflow: hidden;
    }

    ul.tab-type li > div {
        height: 32px;
        border-radius: 6px;
        overflow: hidden;
        cursor: pointer;
        padding: 0 12px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    ul.tab-type .active {
        border: 1px solid var(--primary) !important;
        background-color: var(--white);
        color: var(--primary);
    }

    .upload-field {
        width: 100%;
        border: 1px dashed var(--secondary);
        border-radius: 10px;
        min-height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .upload-field:hover {
        border-color: var(--primary);
        color: var(--primary);
    }

    button.btn-circle {
        height: 32px;
        width: 32px;
        min-width: 32px;
        border-radius: 50%;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .stepquest-composer__content .form-wrap {
        overflow-x: hidden;
        min-width: 550px;
    }

    .form-control[type="checkbox"] {
        width: 16px;
        height: 16px;
    }

    .add-answer {
        width: 100%;
        height: 40px;
        border: 1px dashed var(--dark);
        color: var(--dark);
        border-radius: 6px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .add-answer:hover {
        color: var(--primary);
        border-color: var(--primary);
    }

.h-full {
    height: 100%;
}

.overflow-y-auto {
    overflow-y: auto;
}

ul.tab li {
    list-style-type: none;
    margin-left: 10px;
    float: left;
}

.dialog {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    right: 0;
    overflow: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.dialog .dialog__modal {
    position: absolute;
    background-color: #ccc;
    opacity: 0.7;
    z-index: 10;
    width: 100%;
    height: 100%;
}

.dialog .dialog__container {
    z-index: 999;
    background-color: var(--light);
    width: fit-content;
    height: fit-content;
    min-width: 400px;
    display: flex;
    flex-direction: column;
    border-radius: 6px;
    overflow: hidden;
}

.dialog .dialog__container .dialog__title {
    width: 100%;
    padding: 12px 16px;
    background-color: var(--primary);
    color: var(--light);
}

.dialog .dialog__container .dialog__content {
    min-height: 80px;
    width: 100%;
    padding: 12px 16px;
}

.dialog .dialog__container .dialog__footer {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    gap: 20px;
    padding: 8px 16px;
    border-top: 1px solid var(--primary);
}

.dialog .dialog__container .dialog__footer button {
    min-width: 80px;
}

::-webkit-scrollbar {
  width: 6px;
  height: 6px;
  border-radius: 4px;
}

/* Track */
::-webkit-scrollbar-track {
  background: var(--light);
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #ccc; 
  border-radius: 4px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #888; 
  border-radius: 4px;
}

.delete-step {
    background-image: "@/assets/icons/trash.svg";
}


</style>
@stop