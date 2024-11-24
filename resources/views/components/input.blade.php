<input type="text" 
    name="{{ $name }}"
    placeholder="{{ $placeHolder }}"
    type="{{ $type }}"
    class="form-control defaultInput roboto colorWhite {{ $class }}"
>

<style>
    .defaultInput {
        background: var(--primary-color-darker) !important;
        border: 1px solid var(--primary-color-darker) !important;
    }

    .defaultInput:focus {
        box-shadow: 0 0 0 .25rem var(--primary-color-lighter);
    }
</style>