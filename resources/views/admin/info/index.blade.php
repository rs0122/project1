@extends('layouts.admin')
@section('title','コラム一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>不動産コラム一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\InfoController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\InfoController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $info)
                            <tr>
                                <th>{{ $info->id }}</th>
                                <td>{{ \Str::limit($info->title, 100) }}</td>
                                <td>{{ \Str::limit($info->body, 250) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Admin\InfoController@edit', ['id' => $info->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ action('Admin\InfoController@delete', ['id' => $info->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($user->userhistories != NULL)
                                @foreach ($user->userhistories as $userhistory)
                                    <li class="list-group-item">{{ $userhistory->logined_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
    </div>
    @endsection