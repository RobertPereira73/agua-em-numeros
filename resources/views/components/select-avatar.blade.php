<div class="d-flex flex-column justify-content-center align-items-center {{ $class }}">
    <x-button :class="'p-0 bgNone buttonEdit'" :type="'button'" onclick="openInput(this)">
        <input type="file" class="hidden" 
            name="avatar"
            accept="image/*"
            onchange="loadImage(this)"
        >

        <img id="avatarImg" class="w-100 h-100" 
            src="{{ 
                asset(
                    auth()?->user()?->avatar ?? 'images/avatar/default-2.png'
                ) 
            }}"
        >

        <div class="d-flex justify-content-center align-items-center w-100 h-100 editImage">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
        </div>
    </x-button>
</div>

<script>
    function openInput(button) {
        button.querySelector('input[type="file"]').click();
    }

    function loadImage(input) {
        let avatarImg = document.querySelector('#avatarImg');
        let file = input.files[0];
        
        if (!file)  {
            avatarImg.src = '/images/avatar/default-2.png';
            return
        };

        avatarImg.src = URL.createObjectURL(file);
    }

</script>

<style>
    .buttonEdit {
        position: relative;
        width: 50% !important;
        height: 20vh;
        border-radius: 50%;
    }

    .buttonEdit img {
        border-radius: 50%;
    }

    .editImage {
        opacity: 0;
        position: absolute;
        top: 0;
        right: 0;
        border-radius: 50%;
        background-color: rgba(0,0,0,0.5); 
        z-index: 2;
        cursor: pointer;
        transition: 0.15s
    }

    .buttonEdit:hover .editImage {
        opacity: 1;
    }
</style>