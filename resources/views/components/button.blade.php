<button type="{{ $type }}" class="btn defaultButton w-100 roboto colorWhite {{ $class }}" {{ $events }}
    {{ $attributes->merge(['class' => 'btn']) }}
>
    {{ $slot }}
</button>