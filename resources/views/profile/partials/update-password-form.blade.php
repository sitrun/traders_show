<div class="title">
    Задать новый пароль
</div>
<div class="gray_text">
    Введите старый и новый пароль
</div>

<form method="post" action="{{ route('password.update') }}" style="max-width: 90%;">
    @csrf
    @method('put')

    <input type="password" name="current_password" placeholder="Ваш старый пароль" style="margin-bottom: 1rem;">
    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

    <input type="password" name="password" placeholder="Новый пароль"style="margin-bottom: 1rem;">
    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

    <input type="password" name="password_confirmation" placeholder="Подтверждение пароля" style="margin-bottom: 1rem;">
    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
    <div id="error_old_pass"></div>
    <div class="btns_wrap">
        <input type="submit" value="Сохранить пароль" class="save" style="margin-right: 2rem;">
        <div class="cancel" onclick="CloseModal('old_pass')">Отмена</div>

    </div>
    @if (session('status') === 'password-updated')
        <div class="font-medium text-sm text-green-600" style="padding: 2rem;">
            {{ __('Saved.') }}
        </div>
    @endif
    <script>
        @php
            $modal_old_pass = 'false';

            if(count($errors->updatePassword->get('current_password'))
            or count($errors->updatePassword->get('password'))
            or count($errors->updatePassword->get('password_confirmation'))
            or session('status') === 'password-updated'
            ){
                $modal_old_pass = 'true';
            }
        @endphp
        var open_profile_modal_old_pass = {{$modal_old_pass}};
    </script>

</form>
