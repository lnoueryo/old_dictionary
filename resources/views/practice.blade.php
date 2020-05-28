@extends('layouts.practice')

{{--  @section('css')
<style>
    .table-row {
        background-color: #fff;
    }

    .table-row:hover {
        background-color: #ddd;
    }

    .card {
        margin-top: 40px;
    }

    .circle-button {
        position: fixed;
        display: inline-block;
        text-decoration: none;
        color: rgba(152, 152, 152, 0.43);
        width: 80px;
        height: 80px;
        line-height: 80px;
        font-size: 40px;
        border-radius: 50%;
        text-align: center;
        overflow: hidden;
        font-weight: bold;
        background-image: linear-gradient(#e8e8e8 0%, #d6d6d6 100%);
        text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.66);
        box-shadow: inset 0 2px 0 rgba(255, 255, 255, 0.5), 0 2px 2px rgba(0, 0, 0, 0.19);
        border-bottom: solid 2px #b5b5b5;
    }

    .circle-button i {
        line-height: 80px;
    }

    .circle-button:active {
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.5), 0 2px 2px rgba(0, 0, 0, 0.19);
        border-bottom: none;
    }

    @media screen and (min-width:0px) {
        .circle-button {
            bottom: 20px;
            right: 30px;
        }
    }

    @media screen and (min-width:768px) and (max-width:1024px) {
        .circle-button {
            bottom: 20px;
            right: 50px;
        }
    }

    @media screen and (min-width:1024px) {
        .circle-button {
            bottom: 30px;
            right: 150px;
        }
    }

    .delete-button {
        display: inline-block;
        text-decoration: none;
        width: 20px;
        height: 20px;
        line-height: 20px;
        font-size: 7px;
        border-radius: 50%;
        text-align: center;
        overflow: hidden;
        background-color: #cd5c5c;
        margin-right: 10px;
        margin-top: 5px;
    }

    .delete-button i {
        line-height: 20px;
        color: #fff;
    }

    .td-left {
        width: 10px;
    }
</style>
@endsection('css')  --}}

@section('content')
<div class="card" style="width: 100%;">
    <div class="card-header">
        メモ一覧
    </div>

    <table class="table">
        <tbody>
            @foreach ($memos as $memo)
            <tr data-href="{{route('submit', ['id' => $memo->id])}}" class="table-row">
                <td class="td-left">
                    <a class="delete-button" type="button" data-toggle="modal" data-target="#modal{{$memo->id}}">
                        <i class="fa fa-minus"></i>
                    </a>
                </td>
                <td class="td-right">
                    {{$memo->title}}
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="modal{{$memo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">以下のメモを本当に削除しますか？</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$memo->title}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <button type="button" class="btn btn-primary"
                                onclick="location.href='{{ route('delete', ['id' => $memo->id])}}'">
                                削除
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
<a href="{{ action('PracticeController@showSubmit') }}" class="circle-button">
    <i class="fa fa-plus"></i>
</a>



@endsection('content')
