@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">
@section('title', '登録済みニュースの一覧')

@section('content')
@foreach($flashcards as $flashcard)
@if($flashcard->card_type == 1)
<div class="col-md-8 offset-md-2">
    <div id="summary" class="mainBlock non-member hlt_SUMRY col-md-12">
        <div class="addLmFdWr" id="addLmFdWrHdId">
            <table class="summaryTbl">
                <tbody>
                    <tr>
                        <td class="summaryL">
                            <h1 title="giveとは 意味・読み方・使い方">
                                <div>
                                    <span id="h1Query" style="display: none;">{{ Str::limit($flashcard->name, 15) }}</span>
                                    <span id="h1Suffix"></span>
                                </div>
                                <div class="h1keywords"></div>
                            </h1>
                        </td>
                        <td class="pt-3 pl-5">
                            <table class="audio pt-3 pl-5">
                                <tbody>
                                    <tr>
                                        <td class="pl-5 float-right">
                                            @if(isset($flashcard->sound_path))
                                            <audio src="{{ asset('storage/sound/' . $flashcard->sound_path) }}" class="pl-5" controls>
                                                <source src="{{ asset('storage/sound/' . $flashcard->sound_path) }}" type="audio/mpeg">
                                            </audio>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <!-- <td class="pin-icon-cell">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <i id="icon-pin-word" class="fa fa-thumb-tack fa-rotate-315" aria-hidden="true"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="summaryR">
                            <div class="error">追加できません(登録数上限)</div>
                            <div class="commonBtn wlaBtnI" id="addUwl" data-encquery="give">
                            </div>
                        </td> -->
                    </tr>
                </tbody>
            </table>
            <div class="summaryM descriptionWrp">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <b class="squareCircle description">意味</b>
                            </td>
                            <td class="content-explanation ej" style="display: none;">{{ Str::limit($flashcard->meaning, 15) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="summaryM EGateCoreDataWrp">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <b class="squareCircle description">コア</b>
                        </td>
                        <td>
                        </td>
                        @if(isset($flashcard->image_path))
                        <td class="eGCoreDta">
                            <img src="{{ asset('storage/image/' . $flashcard->image_path) }}" class="trim2">
                        </td>@endif
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="summaryM">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <b class="squareCircle">発音記号・読み方</b>
                        </td>
                        <td>
                            <div id="phoneticEjjeNavi">
                                <div class="phoneticEjjeWrp">
                                    <span class="phoneticEjjeDesc" style="display: none;">{{ $flashcard->phonetic_symbol }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <button class="hide btn btn-primary float-right col-2">click</button>
            </table>
            <form action="{{ action('Front\FlashCardController@game', ['id' => $flashcard->id]) }}" method="POST">
                <div class="mt-2">
                    <input type="submit" id="fail" name="fail" class="btn btn-danger" style="display: none;" value="もう一度 3分後">
                    <input type="submit" id="hard" name="hard" class="btn btn-warning" style="display: none;" value="難しい {{ $next_time_1 }}日後">
                    <input type="submit" id="correct" name="correct" class="btn btn-success" style="display: none;" value="普通 {{ $next_time_2 }}日後">
                    <input type="submit" id="easy" name="easy" class="btn btn-info" style="display: none;" value="簡単 {{ $next_time_3 }}日後">
                    <input type="submit" id="return" name="return" class="btn btn-primary col-1" style="display: none;" value="戻す">
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@elseif($flashcard->card_type == 2)
<div class="col-md-8 offset-md-2">
    <div id="summary" class="mainBlock non-member hlt_SUMRY col-md-12">
        <div class="addLmFdWr" id="addLmFdWrHdId">
            <table class="summaryTbl">
                <tbody>
                    <tr>
                        <td class="summaryL">
                            <h1 title="giveとは 意味・読み方・使い方">
                                <div>
                                    <span id="h1Query">{{ Str::limit($flashcard->name, 15) }}</span>
                                    <span id="h1Suffix"></span>
                                </div>
                                <div class="h1keywords"></div>
                            </h1>
                        </td>
                        <td class="pt-3 pl-5">
                            <table class="audio pt-3 pl-5">
                                <tbody>
                                    <tr>
                                        <td class="pl-5">
                                            @if(isset($flashcard->sound_path))
                                            <audio src="{{ asset('storage/sound/' . $flashcard->sound_path) }}" class="pl-5" controls>
                                                <source src="{{ asset('storage/sound/' . $flashcard->sound_path) }}" type="audio/mpeg">
                                            </audio>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <!-- <td class="pin-icon-cell">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <i id="icon-pin-word" class="fa fa-thumb-tack fa-rotate-315" aria-hidden="true"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="summaryR">
                            <div class="error">追加できません(登録数上限)</div>
                            <div class="commonBtn wlaBtnI" id="addUwl" data-encquery="give">
                            </div>
                        </td> -->
                    </tr>
                </tbody>
            </table>
            <div class="summaryM descriptionWrp">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <b class="squareCircle description">意味</b>
                            </td>
                            <td id="meaning" class="content-explanation ej" style="display: none;">{{ Str::limit($flashcard->meaning, 15) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="summaryM EGateCoreDataWrp">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <b class="squareCircle description">コア</b>
                        </td>
                        <td>
                        </td>
                        @if(isset($flashcard->image_path))
                        <td id="photo" class="eGCoreDta" style="display: none;">
                            <img src="{{ asset('storage/image/' . $flashcard->image_path) }}" class="trim2" style="display: none;">
                        </td>@endif
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="summaryM">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <b class="squareCircle">発音記号・読み方</b>
                        </td>
                        <td>
                            <div id="phoneticEjjeNavi">
                                <div class="phoneticEjjeWrp">
                                    <span class="phoneticEjjeDesc">{{ $flashcard->phonetic_symbol }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <button class="hide btn btn-primary float-right col-2">click</button>
            </table>
            <form action="{{ action('Front\FlashCardController@game', ['id' => $flashcard->id]) }}" method="POST">
                <div class="mt-2">
                    <input type="submit" id="fail" name="fail" class="btn btn-danger" style="display: none;" value="もう一度 3分後">
                    <input type="submit" id="hard" name="hard" class="btn btn-warning" style="display: none;" value="難しい {{ $next_time_1 }}日後">
                    <input type="submit" id="correct" name="correct" class="btn btn-success" style="display: none;" value="普通 {{ $next_time_2 }}日後">
                    <input type="submit" id="easy" name="easy" class="btn btn-info" style="display: none;" value="簡単 {{ $next_time_3 }}日後">
                    <input type="submit" id="return" name="return" class="btn btn-primary col-1" style="display: none;" value="戻す">
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endif
@endforeach

    <script>
        $(function() {
            $('button.hide').click(function(){
                $('#h1Query').show();
                $('#photo').show();
                $('#meaning').show();
                $('#phoneticEjjeNavi').show();
                $('button.hide').hide();
                $('#fail').show();
                $('#hard').show();
                $('#correct').show();
                $('#easy').show();
                $('#return').show();
            });
        });
    </script>

@endsection

