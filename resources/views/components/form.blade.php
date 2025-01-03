<form action="{{ route($route) }}" method="{{ $method }}" 
    class="h-auto defaultForm {{ $class }}"
    onsubmit="send(event)"
    {{ $attributes->merge() }}
>
    {{ $slot }}
</form>

<script src="{{ asset('js/form/form.js') }}"></script>

<style>
    .defaultForm {
        background: var(--primary-color-medium);
        padding: 1.4rem 1.4rem;
        border-radius: 5px;
    }
</style>