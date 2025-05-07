<div>
    <button type="button" class="primary" wire:click="openModal({{ $user->id }})">データを追加</button>

    @if($showModal)
    <div class="modal fade show">
        <div class="modal-body">
            <div class="register-modal__heading">
                <h2>Weight Logを追加</h2>
            </div>

            <div class="register-modal__inner">
                <form class="form" action="/weight_logs/create" method="post">
                    @csrf
                    <div class="register-modal__group">
                        <div class="form__group-title">
                            <span class="form__label--item">日付</span>
                            <span class="form__label--required">必須</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="date" name="date" value="{{ old('date') }}" placeholder="{{ \Carbon\Carbon::today()->format('Y年m月d日') }}" />
                            </div>
                            <div class="form__error">
                                @error('date')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="register-modal__group">
                        <div class="form__group-title">
                            <span class="form__label--item">体重</span>
                            <span class="form__label--required">必須</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="weight" value="{{ old('weight') }}" placeholder="50.0" />kg
                            </div>
                            <div class="form__error">
                                @error('weight')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="register-modal__group">
                        <div class="form__group-title">
                            <span class="form__label--item">摂取カロリー</span>
                            <span class="form__label--required">必須</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="calories" value="{{ old('calories') }}" placeholder="1200" />cal
                            </div>
                            <div class="form__error">
                                @error('calories')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="register-modal__group">
                        <div class="form__group-title">
                            <span class="form__label--item">運動時間</span>
                            <span class="form__label--required">必須</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="time" name="exercise_time" value="{{ old('exercise_time') }}" placeholder="00:00" />
                            </div>
                            <div class="form__error">
                                @error('exercise_time')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="register-modal__group">
                        <div class="form__group-title">
                            <span class="form__label--item">運動内容</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--textarea">
                                <textarea name="exercise_content" value="{{ old('exercise_content') }}" placeholder="運動内容を追加"></textarea>
                            </div>
                            <div class="form__error">
                                @error('exercise_content')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="create__button">
                        <button class="create__button-submit" type="submit" wire:click="createWeightLog">登録</button>
                    </div>
                    <div class="form__button">
                        <button class="back__button" type="button" wire:click="closeModal">戻る</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>