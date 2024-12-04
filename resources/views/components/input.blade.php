<input
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    type="{{ $type }}"
    value="{{ $value }}"
    class="form-control defaultInput roboto colorWhite {{ $class }}"
    {{ $attributes->merge() }}
>


<link rel="stylesheet" href="{{ asset('css/defaultInput.css') }}">