@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index
.css') }}" />
<link rel="stylesheet" href="{{ asset('css/register-modal
.css') }}" />
@endsection

@section('content')

<form class="form" action="/weight_logs/search" method="get">
    <table class="list-table__header">
        <div class="weight-table">
            <tr class="weight-table__header">
                <th class="weight-table__header">目標体重</th>
                <th class="weight-table__header">目標まで</th>
                <th class="weight-table__header">最新体重</th>
            </tr>
            <tr class="weight-table__header">
                <td class="weight-table__text">
                    {{$weightTarget->target_weight}}kg
                </td>
                <td class="weight-table__text">
                    -{{ optional($weightLogs->first())->weight - $weightTarget->target_weight }}kg
                </td>
                <td class="weight-table__text">
                    {{ optional($weightLogs->first())->weight }}kg
                </td>
            </tr>
        </div>
    </table>

    <div class="list-table">
        <input type="date" name="start_date" value="{{ request('start_date') }}" />～
        <input type="date" name="end_date" value="{{ request('end_date') }}" />

        <input type="submit" name="search-button" value="検索">
        <input type="reset" name="reset-button" value="リセット">

        @livewire('register-modal',['userId' => Auth::id()])

        <table class="list-table__inner">
            <tr class="list-table__row">
                <th class="list-table__header">日付</th>
                <th class="list-table__header">体重</th>
                <th class="list-table__header">食事摂取カロリー</th>
                <th class="list-table__header">運動時間</th>
                <th class="list-table__header"></th>
            </tr>

            @foreach ($weightLogs as $weightLog)
            <tr class="list-table__row">
                <td class="list-table__text">
                    {{ $weightLog['date'] }}
                </td>
                <td class="list-table__text">
                    {{ $weightLog['weight'] }}kg
                </td>
                <td class="list-table__text">
                    {{ $weightLog['calories'] }}cal
                </td>
                <td class="list-table__text">
                    {{ $weightLog['exercise_time'] }}
                </td>
                <td>
                    <a href="/weight_logs/{{ $weightLog->id }}">
                        <img src=" {{ asset('image/pen.png') }}" alt="pen">
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</form>
<div> {{ $weightLogs->links('pagination::bootstrap-4') }}
</div>
@endsection