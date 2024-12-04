<table class="table">
    <thead>
        <tr>
            <th class="colorWhite roboto bold">ID</th>
            <th class="colorWhite roboto bold">Repositório</th>
            <th class="colorWhite roboto bold">Usuário</th>
            <th class="colorWhite roboto bold">Description</th>
            <th class="colorWhite roboto bold">Ações</th>
        </tr>
    </thead>

    <tbody>
        @if ($repositories->count())
            @foreach ($repositories as $repository)
                <tr>
                    <td class="colorWhite roboto bold font12">{{ $repository->id }}</td>
                    <td class="colorWhite roboto bold font12">{{ $repository->name }}</td>
                    <td class="colorWhite roboto bold font12">{{ $repository->actor->login }}</td>
                    <td class="colorWhite roboto bold font12">{{ $repository->description }}</td>
                    <td>
                        <div class="w-100 d-flex">
                            <x-button :type="'button'" :class="'buttonAction me-3'" onclick="openModal({{ $repository }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                </svg>
                            </x-button>

                            <x-button :type="'button'" :class="'buttonAction'" onclick="deleteRepository({{ $repository->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </x-button>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="100%" class="colorWhite">Nenhum repositório encontrado!</td>
            </tr>
        @endif
    </tbody>
</table>

<div class="w-100 d-flex justify-content-center">
    <x-pagination :paginator="$repositories"/>
</div>

<style>
    tbody tr td {
        padding: 0.3rem 0 !important;
    }

    .buttonAction {
        width: 50px !important;
        height: 50px !important;
        border-radius: 50%;
        background: red !important;
    }

    .buttonAction:has(.bi-pencil),
    .buttonAction:has(.bi-pencil):hover,
    .buttonAction:has(.bi-pencil):active,
    .buttonAction:has(.bi-pencil):focus {
        background: #0d6efd !important;
        box-shadow: none !important;
        border: none !important;
    }

    .buttonAction:has(.bi-trash),
    .buttonAction:has(.bi-trash):hover,
    .buttonAction:has(.bi-trash):active,
    .buttonAction:has(.bi-trash):focus {
        background: red !important;
        box-shadow: none !important;
        border: none !important;
    }
</style>