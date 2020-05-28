@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">
@section('title', 'ニュースの新規作成')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h2></h2>
            <form action="{{ action('Front\WordController@update') }}" method="POST" enctype="multipart/form-data">
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
                　　<input type="text" id="name" class="form-control" name="name" value="{{ $name_form->name }}">
                　</div>
                　<label class="col-md-1" for="language">言語</label>
                　<div class="col-md-4">
                    <select class="form-control" id="language" name="language" value="{{ $name_form->language }}">
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
                　　<input type="text" id="phonetic_symbol" class="form-control" name="phonetic_symbol" value="{{ $name_form->phonetic_symbol }}" placeholder="仮想キーボード">
                　</div>
                　<label class="col-md-1" for="parts_of_speech">品詞</label>
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
                    <div class="col-md-9">
                        <input type="text" id="meaning" class="form-control" name="meaning" value="{{ $name_form->meaning }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-1" for="example_sentence">例文</label>
                    <div class="col-md-9">
                        <div id="input_pluralBox">
                            <div id="input_plural">
                                <input type="text" id="example_sentence" class="form-control" placeholder="jquery focusin add" value="{{ old('example_sentence') }}">
                                <input type="button" value="＋" class="add pluralBtn btn-primary m-1">
                                <input type="button" value="－" class="del pluralBtn btn-danger m-1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-1" for="image_path">画像</label>
                    <div class="col-md-10">
                        <input type="file" id="image_path" accept="image/*" class="form-control-file" name="image_path" value="{{ $name_form->image_path }}">
                        <div class="form-group row">{{ $name_form->image_path }}
                            <img id="preview" class="trim m-3">
                            <p class="m-1">※単語に関係のある画像を選択して下さい</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <label class="col-md-1" for="sound">音声</label>
                    <div class="col-md-10">
                        <input type="file" id="sound" accept="audio/*" class="form-control-file" name="sound" value="{{ $name_form->sound_path }}">
                        {{ $name_form->sound_path }}
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary col-md-3 offset-md-1" value="登録">
            </form>
        </div>
    </div>
</div>

                {{--  <div class="container">
                    <h1>Upload cropped image to server</h1>
                    <label class="label" data-toggle="tooltip" title="" data-original-title="Change your avatar">
                      <img class="rounded" id="avatar" src="https://avatars0.githubusercontent.com/u/3456749?s=160" alt="avatar">
                      <input type="file" class="sr-only" id="input" name="image" accept="image/*">
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
                              <img id="image" src="blob:https://fengyuanchen.github.io/eba7729d-5f48-4a4d-ad91-0b345d6ea92e" class="">
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

  {{--  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../js/cropper.js"></script>
  <script>
      window.addEventListener('DOMContentLoaded', function () {
        var avatar = document.getElementById('avatar');
        var image = document.getElementById('image');
        var input = document.getElementById('input');
        var $progress = $('.progress');
        var $progressBar = $('.progress-bar');
        var $alert = $('.alert');
        var $modal = $('#modal');
        var cropper;

        $('[data-toggle="tooltip"]').tooltip();

        input.addEventListener('change', function (e) {
          var files = e.target.files;
          var done = function (url) {
            input.value = '';
            image.src = url;
            $alert.hide();
            $modal.modal('show');
          };
          var reader;
          var file;
          var url;

          if (files && files.length > 0) {
            file = files[0];

            if (URL) {
              done(URL.createObjectURL(file));
            } else if (FileReader) {
              reader = new FileReader();
              reader.onload = function (e) {
                done(reader.result);
              };
              reader.readAsDataURL(file);
            }
          }
        });

        $modal.on('shown.bs.modal', function () {
          cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
          });
        }).on('hidden.bs.modal', function () {
          cropper.destroy();
          cropper = null;
        });

        document.getElementById('crop').addEventListener('click', function () {
          var initialAvatarURL;
          var canvas;

          $modal.modal('hide');

          if (cropper) {
            canvas = cropper.getCroppedCanvas({
              width: 160,
              height: 160,
            });
            initialAvatarURL = avatar.src;
            avatar.src = canvas.toDataURL();
            $progress.show();
            $alert.removeClass('alert-success alert-warning');
            canvas.toBlob(function (blob) {
              var formData = new FormData();

              formData.append('avatar', blob, 'avatar.jpg');
              $.ajax('https://jsonplaceholder.typicode.com/posts', {
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,

                xhr: function () {
                  var xhr = new XMLHttpRequest();

                  xhr.upload.onprogress = function (e) {
                    var percent = '0';
                    var percentage = '0%';

                    if (e.lengthComputable) {
                      percent = Math.round((e.loaded / e.total) * 100);
                      percentage = percent + '%';
                      $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                    }
                  };

                  return xhr;
                },

                success: function () {
                  $alert.show().addClass('alert-success').text('Upload success');
                },

                error: function () {
                  avatar.src = initialAvatarURL;
                  $alert.show().addClass('alert-warning').text('Upload error');
                },

                complete: function () {
                  $progress.hide();
                },
              });
            });
          }
        });
      });
    </script>  --}}
                    {{ csrf_field() }}
                <input type="submit" class="btn btn-primary col-md-3 offset-md-1" value="登録">
            </form>
        </div>
    </div>
</div>
@endsection
