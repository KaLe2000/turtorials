@if($user->type === $user::TYPE_STUDENT)
    <a href="{{ route('cashFlow.create', $user) }}" class="btn-blue">
        {{ __('Пополнить баланс') }}
    </a>
    @if($lesson !== null)
        <a href="{{ route('lesson.sign', $lesson) }}" class="btn-green">
            {{ __('Записаться на урок') }}
        </a>
    @endif
@else
    @if($course !== null)
        <a href="{{ route('lesson.create', $course) }}" class="btn-green">
            {{ __('Создать урок') }}
        </a>
    @endif
    @if($lesson !== null)
        <a href="{{ route('lesson.start', ['course' => $course,'lesson' => $lesson]) }}" class="btn-green">
            {{ __('Начать урок') }}
        </a>
        <a href="{{ route('lesson.complete', ['course' => $course,'lesson' => $lesson]) }}" class="btn-green">
            {{ __('Завершить урок') }}
        </a>
    @endif
@endif
