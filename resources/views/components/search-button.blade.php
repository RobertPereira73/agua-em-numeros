<x-container-input :name="$name" class="d-flex">
    <x-input :name="$name" :placeholder="$placeholder" type="text" class="searchInput"/> 
    <button type="button" class="btn btnSearch">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
    </button>
</x-container-input>

<style>
    input.form-control.searchInput {
        background: var(--primary-color-medium) !important;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .btnSearch {
        background: var(--primary-color-medium);
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }
</style>