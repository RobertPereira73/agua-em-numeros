<div class="row mb-3">
    <div class="col-12 {{ $class }}">
        {{ $slot }}
    </div>

    @if ($name)
        <div id="{{ $name }}Errors" class="col-12 containerError d-flex flex-column"></div>
    @endif
</div>

<style>
    .containerError:not(:has(span)) {
        display: none;
    }

    .containerError span {
        color: red;
    }
</style>