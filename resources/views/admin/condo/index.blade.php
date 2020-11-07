@extends('layouts.admin')
@section('title', '販売物件一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>For Sale!!</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\CondoController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\CondoController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">マンション名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_condo" value="{{ $cond_condo }}">
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
                                <th width="5%">ID</th>
                                <th width="10%">物件名</th>
                                <th width="10%">販売価格</th>
                                <th width="15%">所在地・沿線/駅</th>
                                <th width="10%">専有面積</th>
                                <th width="5%">間取り</th>
                                <th width="10%">築年数</th>
                                <th width="10%">階数</th>
                                <th width="10%">向き</th>
                                <th width="10%">管理費</th>
                                <th width="10%">修繕積立金</th>
                                <th width="20%">ユーザー</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $condos)
                                <tr>
                                    <th>{{ $condos->id }}</th>
                                    <td>{{ \Str::limit($condos->condo, 20) }}</td>
                                    <td>{{ \Str::limit($condos->price, 20) }}</td>
                                    <td>{{ \Str::limit($condos->place, 50) }}</td>
                                    <td>{{ \Str::limit($condos->area, 20) }}</td>
                                    <td>{{ \Str::limit($condos->plan, 10) }}</td>
                                    <td>{{ \Str::limit($condos->old, 20) }}</td>
                                    <td>{{ \Str::limit($condos->floor, 10) }}</td>
                                    <td>{{ \Str::limit($condos->direction, 10) }}</td>
                                    <td>{{ \Str::limit($condos->expense, 10) }}</td>
                                    <td>{{ \Str::limit($condos->fix, 10) }}</td>
                                    <td>
                                        <!--condoのidとuserのidを送れるようにする-->
                                        <form action="{{ action('Admin\CondoController@post') }}" method="post" enctype="multipart/form-data">
                                            <select>
                                                @foreach($users as $user)
                                                <option>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            {{ csrf_field() }}
                                            <input type="submit" name="submit" value="送信">
                                        </form>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\CondoController@edit', ['id' => $condos->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\CondoController@delete', ['id' => $condos->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection