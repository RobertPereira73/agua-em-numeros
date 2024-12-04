<div class="sidebar d-flex flex-column justify-content-between py-3 px-5 h-100">
    <div class="w-100">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt=""
                style="
                    width: 25%;
                    max-height: 20vh;
                "
            >
            <span class="ms-3 roboto bold colorWhite">Repo Tracker</span>
        </div>
    
        <div class="w-100 containerMenu d-flex justify-content-center">
            <ul class="w-100 p-0 m-0 menu" type="none">
                @foreach ($menus as $menu)
                    <li id="{{ $menu->getMenuId() }}" class="p-3 mb-3 {{ $menu->getMenuId() == $actualMenu?->getMenuId() ? 'active' : '' }}">
                        <a href="{{ route($menu->getRoute()) }}" class="decorationNone roboto colorWhite">
                            {!! $menu->getMenuIcon() !!}
                            <span>{{ $menu->getMenuName() }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="containerLogout w-100 d-flex justify-content-center">
        <a href="{{ route('logout') }}" class="btn colorWhite roboto">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
            </svg>
            <span>Sair</span>
        </a>
    </div>
</div>

<style>
    .sidebar {
        position: relative;
        width: 15%;
        border-right: 1px solid var(--primary-color-lighter);
    }

    .containerMenu {
        margin-top: 5rem;
    }

    .containerMenu li {
        width: 100%;
        display: flex;
        align-items: center;
        cursor: pointer;
        border-radius: 10px;
        transition: 0.15s;
        justify-content: center;
    }

    .containerMenu li.active,
    .containerMenu li:hover {
        background: var(--primary-color-medium) !important;
    }

    .containerMenu li a {
        display: flex;
        align-items: flex-start;
    }

    .containerLogout {
        margin-bottom: 5rem
    }
</style>