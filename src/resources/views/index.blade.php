@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index
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
                @livewire('register-modal',['weightLog' => $weightLog])
            </td>

            <tr class="list-table__row">
                <th class="list-table__header">日付</th>
                <td class="list-table__text">
                    <input type="text" name="date" value="{{ $weight_log['date'] }}" readonly />
                </td>
            </tr>
            <tr class="list-table__row">
                <th class="list-table__header">体重</th>
                <td class="list-table__text">
                    <input type="text" name="weight" value="{{ $weight_log['weight'] }}" readonly />kg
                </td>
            </tr>
            <tr class="list-table__row">
                <th class="list-table__header">食事摂取カロリー</th>
                <td class="list-table__text">
                    <input type="text" name="calories" value="{{ $weight_log['calories'] }}" readonly />col
                </td>
            </tr>
            <tr class="list-table__row">
                <th class="list-table__header">運動時間</th>
                <td class="list-table__text">
                    <input type="time" name="exercise_time" value="{{ $weight_log['exercise_time'] }}" readonly />
                </td>
            </tr>
        </table>
    </div>
</form>
<div> {{ $products->links('pagination::bootstrap-4') }}
</div>
@endsection