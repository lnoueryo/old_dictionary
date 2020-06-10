
@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">
@section('title', 'ニュースの新規作成')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div id="summary" class="mainBlock">
                <h2></h2>
                <form action="{{ action('Front\WordController@update') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $name_form->id }}">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                <div class="form-group row">
                    <label class="col-md-1" for="name">単語</label>
                    <div class="col-md-4">
                　　    <input type="text" id="name" class="form-control" name="name" value="{{ $name_form->name }}" required>
                        </div>
                　   <label class="col-md-1" for="language">言語</label>
                　   <div class="col-md-4">
                    　　<select class="form-control" id="language" name="language" value="{{ $name_form->language }}" required>
                        　<option value="{{ $name_form->language }}">{{ $name_form->language }}</option>
                        　<option value="日本語">日本語</option>
                        　<option value="英語">英語</option>
                        　<option value="ドイツ語">ドイツ語</option>
                        </select>
                　  </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-1" for="phonetic_symbol">発音</label>
                    <div class="col-md-4">
                        　  <input type="text" id="search_field" class="form-control" name="phonetic_symbol" value="{{ $name_form->phonetic_symbol }}" placeholder="仮想キーボード">
                        　</div>
                　   <label class="col-md-1" for="language">品詞</label>
                　   <div class="col-md-4">
                    　　<select class="form-control" id="parts of speech" name="parts_of_speech" value="{{ $name_form->parts_of_speech }}">
                        　<option value="{{ $name_form->parts_of_speech }}">{{ $name_form->parts_of_speech }}</option>
                        　<option value="動詞">動詞</option>
                        　<option value="名詞">名詞</option>
                        　<option value="形容詞">形容詞</option>
                        　<option value="副詞">副詞</option>
                        　<option value="前置詞">前置詞</option>
                        </select>
                　  </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-1" for="meaning">意味</label>
                    <div class="meaning">
                    　  <input type="text" id="meaning" class="form-control" name="meaning" value="{{ $name_form->meaning }}" required>
                　　</div>　
                </div>
                    {{--  <div class="form-group row">
                        <label class="col-md-1" for="meaning">意味</label>
                        <div class="col-md-9">
                            <div id="input_pluralBox">
                                <div id="input_plural">
                                    <input type="text" id="example_sentence" class="form-control" placeholder="jquery focusin add" value="{{ old('example_sentence') }}">
                                    <input type="button" value="＋" class="add pluralBtn btn-primary m-1">
                                    <input type="button" value="－" class="del pluralBtn btn-danger m-1">
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    <div class="form-group row">
                        <label class="col-md-1" for="image_path">画像</label>
                        <div class="col-md-4">
                            <input type="file" id="image_path" accept="image/*" class="form-control-file" name="image_path" value="{{ $name_form->image_path }}">
                            <div class="form-group row">
                                <img id="preview" class="trim m-3">
                                <p class="m-1">※単語に関係のある画像を選択して下さい</p>
                            </div>
                        </div>
                        <label class="col-md-1" for="sound_path">音声</label>
                        <div class="col-md-4">
                            <input type="file" id="sound_path" accept="audio/*" class="form-control-file" name="sound_path" value="{{ $name_form->sound_path }}">
                            <div class="form-group row  mt-5">
                                <audio id="sound_preview" controls>>
                                <p class="m-1">※単語に関係のある画像を選択して下さい</p>
                            </div>
                        </div>
                    　

                    {{--  <div class="container">
                        <h1>Upload cropped image to server</h1>
                        <label class="label" data-toggle="tooltip" title="" data-original-title="Change your avatar">
                        <img class="rounded" id="avatar" src="https://avatars0.githubusercontent.com/u/3456749?s=160" alt="avatar">
                        <input type="file" class="sr-only form-control-file" id="input" name="image" accept="image/*">
                        </label>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <div class="alert" role="alert" style="display: none;"></div>
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                <img id="image" src="blob:https://fengyuanchen.github.io/eba7729d-5f48-4a4d-ad91-0b345d6ea92e" class="image">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="crop">Crop</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>  --}}

                    {{--  <input type="file" name="image" id="image" onchange="readURL(this);"/>
                        <div class="image_container">
                            <img id="blah" src="#" alt="your image" />
                        </div>
                        <div id="cropped_result"></div>
                        <button id="crop_button">Crop</button>


    <link  href="cropper.min.css" rel="stylesheet">
    <script src="cropper.min.js"></script>
    <script src="jquery.js"></script>


        <script type="text/javascript" defer>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result)
                    };
                    reader.readAsDataURL(input.files[0]);
                    setTimeout(initCropper, 1000);
                }
            }
            function initCropper(){
                var image = document.getElementById('blah');
                var cropper = new Cropper(image, {
                aspectRatio: 1 / 1,
                crop: function(e) {
                    console.log(e.detail.x);
                    console.log(e.detail.y);
                }
                });

                // On crop button clicked
                document.getElementById('crop_button').addEventListener('click', function(){
                    var imgurl =  cropper.getCroppedCanvas().toDataURL();
                    var img = document.createElement("img");
                    img.src = imgurl;
                    document.getElementById("cropped_result").appendChild(img);



                    cropper.getCroppedCanvas().toBlob(function (blob) {
                        var formData = new FormData();
                        formData.append('croppedImage', blob);
                        // Use `jQuery.ajax` method
                        $.ajax('/path/to/upload', {
                        url: "{{ action('Front\WordController@create') }}",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function () {
                            console.log('Upload success');
                        },
                        error: function () {
                            console.log('Upload error');
                        }
                        });
                });
                })
            }
        </script>  --}}


                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-green col-md-3 offset-md-1" value="登録">
                </form>
            </div>
        </div>
    </div>
</div>
{{--  <input type="text" id="search_field">  --}}
<div class="modal key-modal">
    <div class="modal__bg key-modal-close">
        <div class="key_modal__content">
            <div id="keyboard">
                <ul class="jkeyboard">
                    <li class="jline">
                        <ul>
                            <li class="jkey letter">q</li>
                            <li class="jkey letter">w</li>
                            <li class="jkey letter">e</li>
                            <li class="jkey letter">r</li>
                            <li class="jkey letter">t</li>
                            <li class="jkey letter">y</li>
                            <li class="jkey letter">u</li>
                            <li class="jkey letter">i</li>
                            <li class="jkey letter">o</li>
                            <li class="jkey letter">p</li>
                        </ul>
                    </li>
                    <li class="jline">
                        <ul>
                            <li class="jkey letter">a</li>
                            <li class="jkey letter">s</li>
                            <li class="jkey letter">d</li>
                            <li class="jkey letter">f</li>
                            <li class="jkey letter">g</li>
                            <li class="jkey letter">h</li>
                            <li class="jkey letter">j</li>
                            <li class="jkey letter">k</li>
                            <li class="jkey letter">l</li>
                        </ul>
                    </li>
                    <li class="jline">
                        <ul>
                            <li class="jkey shift">&nbsp;</li>
                            <li class="jkey letter">z</li>
                            <li class="jkey letter">x</li>
                            <li class="jkey letter">c</li>
                            <li class="jkey letter">v</li>
                            <li class="jkey letter">b</li>
                            <li class="jkey letter">n</li>
                            <li class="jkey letter">m</li>
                            <li class="jkey backspace">&nbsp;</li>
                        </ul>
                    </li>
                    <li class="jline">
                        <ul>
                            <li class="jkey numeric_switch">123</li>
                            <li class="jkey layout_switch">&nbsp;</li>
                            <li class="jkey space">space</li>
                            <li class="jkey return">Enter</li>
                        </ul>
                    </li>
                </ul>
            </div>

                <button class="key-modal-close btn btn-danger">
                    No
                </button>
            </div>
        </div>
    </div>
</div>
</div>

    {{--  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>  --}}
        <script src="js/jkeyboard.js"></script>
        <script>
            $('#keyboard').jkeyboard({
              layout: "english",
              input: $('#search_field')
            });
        </script>
@endsection('content')
