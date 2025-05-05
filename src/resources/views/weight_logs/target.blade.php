@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/target.css') }}" />
@endsection

@section('content')

<div class="show__heading">
    <h2>目標体重設定</h2>
</div>

<div class="show__inner">
    <form class="form" action="/weight_logs" method="post">
        @csrf
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="target_weight" placeholder="46.5" />kg
                <div class="form__error">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="back__button" type="button">戻る</button>
        </div>
        <div class=" create__button">
            <button class="update__button-submit" type="submit">更新</button>
        </div>
    </form>
</div>
@endsection