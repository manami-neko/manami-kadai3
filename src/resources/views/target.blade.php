@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/target.css') }}" />
@endsection

@section('content')

<div class="show__heading">
    <h2>目標体重設定</h2>
</div>

<div class="show__inner">
    <form class="form" action="/weight_logs/{{ $weightTarget->id }}/update" method="post">
        @csrf
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="hidden" name="id" value="{{ $weightTarget['id'] }}" />
                <input type="text" name="target_weight" value="{{ $target_weight }}" />kg
                <div class="form__error">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <a href="/weight_logs" class="back__button">戻る</a>

        </div>
        <div class=" create__button">
            <button class="update__button-submit" type="submit">更新</button>
        </div>
    </form>
</div>
@endsection