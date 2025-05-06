@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index
.css') }}" />
<link rel="stylesheet" href="{{ asset('css/register-modal
.css') }}" />
@endsection

@section('content')

<form class="form" action="/weight_logs/search" method="get">
    <div class="list-table">
        <table class="list-table__inner">
            <tr class="list-table__row">
                <th class="list-table__header">
                <td class="list-table__text">
                    <input type="date" name="date" />～
                    <input type="date" name="date" readonly />
                </td>
            </tr>
            </th>
            <input type="submit" name="search-button" value="検索">
            <input type="submit" name="reset-button" value="リセット">
            <td>
                @livewire('register-modal',['userId' => Auth::id()])
            </td>

            <tr class="list-table__row">
                <th class="list-table__header">日付</th>
                <th class="list-table__header">体重</th>
                <th class="list-table__header">食事摂取カロリー</th>
                <th class="list-table__header">運動時間</th>
            </tr>

            @foreach ($weightLogs as $weightLog)
            <tr class="list-table__row">
                <td class="list-table__text">
                    <input type="text" name="date" value="{{ $weightLog['date'] }}" readonly />
                </td>
                <td class="list-table__text">
                    <input type="text" name="weight" value="{{ $weightLog['weight'] }}" readonly />kg
                </td>
                <td class="list-table__text">
                    <input type="text" name="calories" value="{{ $weightLog['calories'] }}" readonly />col
                </td>
                <td class="list-table__text">
                    <input type="time" name="exercise_time" value="{{ $weightLog['exercise_time'] }}" readonly />
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</form>
<div> {{ $weightLogs->links('pagination::bootstrap-4') }}
</div>
@endsection