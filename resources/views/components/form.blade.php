<form action="{{ route($route) }}" method="{{ $method }}" 
    class="h-auto defaultForm {{ $class }}"
>
    {{ $slot }}
</form>

<style>
    .defaultForm {
        background: var(--primary-color-medium);
        padding: 1.4rem 1.4rem;
        border-radius: 5px;
    }
</style>