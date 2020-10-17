@extends('layouts.admin')
@section('title', '販売物件の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>物件編集</h2>
                <form action="{{ action('Admin\CondoController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="condo">物件名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="condo" value="{{ $condo_form->condo }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="price">販売価格</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="price" value="{{ $condo_form->price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="place">所在地・沿線/駅</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="place" row="50">{{ $condo_form->place }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="area">専有面積</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="area" value="{{ $condo_form->area }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="plan">間取り</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="plan" value="{{ $condo_form->plan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="old">築年数</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="old" value="{{ $condo_form->old }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="description">マンション概要</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="20">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">外観写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $condo_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $condo_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection