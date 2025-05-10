@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')

<div class="show__heading">
    <h2>Weight Log</h2>
</div>

<div class="show__inner">
    <form class="form" action="/weight_logs/{weightLogId}" method="post">
        @csrf
        <div class="show__group">
            <div class="form__group-title">
                <span class="form__label--item">日付</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="date" name="date" value="{{ $weightLogs->date }}" placeholder="{{ \Carbon\Carbon::today()->format('Y年m月d日') }}" />
                </div>
                <div class="form__error">
                    @error('date')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="show__group">
            <div class="form__group-title">
                <span class="form__label--item">体重</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="weight" value="{{ $weightLogs->weight }}" placeholder="50.0" />kg
                </div>
                <div class="form__error">
                    @error('weight')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="show__group">
            <div class="form__group-title">
                <span class="form__label--item">摂取カロリー</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="calories" value="{{ $weightLogs->calories }}" placeholder="1200" />cal
                </div>
                <div class="form__error">
                    @error('calories')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="show__group">
            <div class="form__group-title">
                <span class="form__label--item">運動時間</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="time" name="exercise_time" value="{{ $weightLogs->exercise_time }}" placeholder="00:00" />
                </div>
                <div class="form__error">
                    @error('exercise_time')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="show__group">
            <div class="form__group-title">
                <span class="form__label--item">運動内容</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="exercise_content" value="{{ $weightLogs->exercise_content }}" placeholder="運動内容を追加"></textarea>
                </div>
                <div class="form__error">
                    @error('exercise_content')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="back__button" type="button" ">戻る</button>
        </div>
        <div class=" create__button">
                <button class="update__button-submit" type="submit">更新</button>
        </div>
    </form>
</div>
@endsection