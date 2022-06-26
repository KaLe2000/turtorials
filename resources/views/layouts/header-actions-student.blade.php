<a href="{{ route('cashFlow.create', $user) }}" class="btn-blue">
    {{ __('Пополнить баланс') }}
</a>
@if($lesson !== null)
    <a href="{{ route('lesson.sign', $lesson) }}" class="btn-green">
        {{ __('Записаться на урок') }}
    </a>
@endif

