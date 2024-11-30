<div class="w-100 mb-5 py-3 px-5 d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <img src="{{ asset('images/logo-3.png') }}" alt=""
            style="
                width: 25%;
                max-height: 20vh;
            "
        >
        <span class="ms-3 roboto bold colorWhite">Repo Tracker</span>
    </div>

    <div class="d-flex align-items-center justify-content-end">
        <span class="colorWhite roboto me-2">Olá, {{ $userName }}</span>
        <div class="btn-group">
            <button type="button" class="p-0 btn dropdown-toggle dropdown-toggle-split buttonActions" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset(auth()->user()->avatar) }}" alt=""
                    style="
                        width: 50px;
                        border-radius: 50%;
                    "
                >
                <span class="roboto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                    </svg>
                </span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item robot font12" href="{{ route('account') }}">Meu perfil</a></li>
                <li><a class="dropdown-item robot font12" href="{{ route('logout') }}">Sair</a></li>
            </ul>
        </div>
    </div>
</div>

<style>
    .buttonActions {
        box-shadow: none !important;
    }

    .dropdown-menu {
        background: var(--primary-color-medium)
    }

    .dropdown-menu li a {
        color: white !important;
    }

    .dropdown-menu li a.dropdown-item:active {
        background: #e9ecef;
    }

    .dropdown-menu li a:hover,
    .dropdown-menu li a:focus,
    .dropdown-menu li a:active {
        color: black !important;
    }

    .dropdown-toggle-split::after {
        display: none !important;
    }
</style>