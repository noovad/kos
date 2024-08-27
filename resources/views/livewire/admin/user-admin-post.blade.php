<div>
    @section('title', $title ?? '')
    <div class="flex justify-between mt-4 mb-4">
        <button class="btn btn-xs bg-blue text-white border-none" onclick="modalCreate.showModal()">
            + Tambah Admin
        </button>
    </div>

    {{-- Modal Create --}}
    <dialog wire:ignore.self id="modalCreate" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg text-center text-blue">
                @if ($update_data === true)
                    Perbarui Data Admin
                @else
                    Tambah Admin
                @endif
            </h3>

            <label for="name" class="block mb-2 text-xs">Nama</label>
            <input wire:model='name' type="text" id="name" placeholder="Nama"
                class="input input-sm input-bordered w-full mb-2" />

        
            @if ($update_data === true)
                <label for="room_id" class="block mb-2 text-xs">
                    <input wire:model.lazy="update_password" type="checkbox" id="checklist" class="mr-2">
                    Perbarui Password</label>

                <div class=@if (trim($update_password) === '') "hidden" @endif>

                    <label for="password" class="block mb-2 text-xs">Password</label>
                    <input wire:model='password' type="password" id="password" placeholder="Password"
                        class="input input-sm input-bordered w-full mb-2" />

                    <label for="password_confirmation" class="block mb-2 text-xs">Password Confirmation</label>
                    <input wire:model='password_confirmation' type="password" id="password_confirmation"
                        placeholder="Password Confirmation" class="input input-sm input-bordered w-full mb-2" />
                </div>
            @else
                <label for="password" class="block mb-2 text-xs">Password</label>
                <input wire:model='password' type="password" id="password" placeholder="Password"
                    class="input input-sm input-bordered w-full mb-2" />

                <label for="password_confirmation" class="block mb-2 text-xs">Password Confirmation</label>
                <input wire:model='password_confirmation' type="password" id="password_confirmation"
                    placeholder="Password Confirmation" class="input input-sm input-bordered w-full mb-2" />
            @endif

            <div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <small class="text-error">{{ $error }}</small><br>
                    @break
                @endforeach
            @endif
        </div>

        <div class="flex justify-center items-center">
            <div class="modal-action mx-4">
                @if ($update_data === true)
                    <button wire:click='update()'
                        class="btn btn-xs bg-blue text-white border-none">Perbarui</button>
                @else
                    <button wire:click='register' class="btn btn-xs bg-blue text-white border-none">Simpan</button>
                @endif
                <button wire:click='closeModal' class="btn btn-xs bg-blue text-white border-none">Batal</button>
            </div>
        </div>
</dialog>

<script>
    window.addEventListener('open-modal-create', event => {
        document.getElementById('modalCreate').showModal();
    })

    window.addEventListener('close-modal-create', event => {
        document.getElementById('modalCreate').close();
    })
</script>

<script>
    document.getElementById('phoneInput').addEventListener('input', function(event) {
        let phoneNumber = event.target.value;
        phoneNumber = phoneNumber.replace(/\D/g, '');
        const maxLength = 11;
        // Pisahkan nomor telepon menjadi potongan sesuai dengan panjang yang ditentukan
        let formattedPhoneNumber = '';
        for (let i = 0; i < phoneNumber.length; i++) {
            if (i === 3 || i === 7) {
                formattedPhoneNumber += '-';
            }
            formattedPhoneNumber += phoneNumber[i];
            if (i === maxLength - 1) {
                break;
            }
        }
        // Masukkan nomor telepon yang sudah diformat kembali ke dalam input
        event.target.value = formattedPhoneNumber;
    });
</script>
</div>
