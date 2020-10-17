@extends('layouts.admin')

@section('title', 'マンション登録画面')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マンション登録</h2>
                <form action="{{ action('Admin\CondoController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0 )
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">物件名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="condo" value="{{ old('condo') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">販売価格</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">所在地・沿線/駅</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="place" rows="3">{{ old('place') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">専有面積</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="area" value="{{ old('area') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">間取り</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="plan" value="{{ old('plan') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">築年月日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="old" value="{{ old('old') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">マンション概要</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="10">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">外観写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection