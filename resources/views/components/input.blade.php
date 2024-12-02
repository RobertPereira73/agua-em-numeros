<input
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    type="{{ $type }}"
    value="{{ $value }}"
    class="form-control defaultInput roboto colorWhite {{ $class }}"
    {{ $events }}
>

<style>
    .defaultInput {
        appearance: none !important;
        background: var(--primary-color-darker) !important;
        border: 1px solid var(--primary-color-darker) !important;
        color: var(--primary-text-color);
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    /* Estilo para autofill */
    .defaultInput:-internal-autofill-selected,
    .defaultInput:-internal-autofill-previewed,
    .defaultInput:-webkit-autofill,
    .defaultInput:autofill,
    .defaultInput:-moz-autofill {
        background: var(--primary-color-darker) !important;
        border: 1px solid var(--primary-color-darker) !important;
        -webkit-box-shadow: 0 0 0 1000px var(--primary-color-darker) inset !important;
        -webkit-text-fill-color: var(--primary-text-color) !important;
    }

    .defaultInput:focus {
        box-shadow: 0 0 0 .25rem var(--primary-color-lighter);
    }

    .defaultInput.error {
        background: var(--primary-color-darker) !important;
        border: 1px solid red !important;
    }

    .defaultInput.error:focus {
        box-shadow: 0 0 0 .25rem red;
    }

    .defaultInput:disabled,
    input.defaultInput[disabled] {
        background: var(--primary-color-lighter) !important;
        border: 1px solid var(--primary-color-lighter) !important;
        cursor: not-allowed;
    }
</style>