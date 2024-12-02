<div class="loading-spinner {{ $size }}">
    <div class="spinner"></div>
</div>

<style>
    /* Estilos básicos */
    .loading-spinner {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Tamanhos */
    .loading-spinner.sm .spinner {
        width: 20px;
        height: 20px;
        border-width: 2px;
    }

    .loading-spinner.md .spinner {
        width: 40px;
        height: 40px;
        border-width: 4px;
    }

    .loading-spinner.lg .spinner {
        width: 80px;
        height: 80px;
        border-width: 6px;
    }

    /* Spinner animado */
    .spinner {
        border: solid 4px transparent;
        border-top-color: var(--primary-color, #3498db);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
</style>
