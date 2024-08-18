<div>
    @section('title', $title ?? '')
    <div class="flex justify-center bg-white drop-shadow-2xl mx-10 rounded-lg mt-4">
        <div class="card p-2 flex flex-col justify-center items-center">
            <div class="avatar placeholder mb">
                <div class="bg-gray-200 text-neutral-content rounded-full w-24">
                    <span class="text-5xl font-bold text-blue">{{ substr($user->name, 0, 1) }}</span>
                </div>
            </div>
            <h3 class="text-xl font-semibold text-blue mb-2">{{ $user->name }}</h3>
            <small class="-m-1 mb-4">{{ $user->start_date ?? 'Tidak Aktif' }}</small>
            <div>
                <div class="card border border-grey text-black mt-4 mb-4">
                    <p class="p-2 text-center font-bold text-blue">{{ $user->room->name ?? ""}}</p>
                </div>
                <div class="card border border-grey text-black mt-4 mb-4">
                    <div class="grid grid-cols-7 gap-2 p-2">
                        <div class="col-span-6 rounded-lg">
                            <p class="pl-3 -mb-1">{{ $user->phone ?? "" }}</p>

                        </div>
                        <div class="col-span-1 flex flex-col justify-center">
                            <button class="btn btn-xs bg-blue text-white border-none"
                                onclick="document.getElementById('modalUpdatePhone').showModal()">Ubah</button>
                        </div>
                    </div>
                </div>
                <button class="btn mb-2 w-full text-white bg-blue btn-sm"
                    onclick="document.getElementById('modalUpdatePassword').showModal()">Ganti Password</button>
                <button wire:click='logout' class="btn mb-2 w-full bg-blue text-white btn-sm">Logout</button>
            </div>
        </div>
    </div>

    <dialog wire:ignore.self id="modalUpdatePhone" class="modal">
        <div class="modal-box w-5/12 max-w-md">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <small class="text-error">{{ $error }}</small><br>
                @break
            @endforeach
        @endif
        <div class="flex mb-8">
            <span class="input input-sm">+62</span>
            <input wire:model='phone' type="text" id="phoneInput" placeholder="No Telepon"
                class="input input-sm input-bordered w-full" />
        </div>
        <div class="flex justify-center items-center">
            <button wire:click='updatePhone'
                class="btn mb-2 w-full bg-blue text-white btn-sm max-w-sm">Ubah</button>
        </div>
    </div>
</dialog>

<dialog wire:ignore.self id="modalUpdatePassword" class="modal">
    <div class="modal-box w-5/12 max-w-md">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <small class="text-error">{{ $error }}</small><br>
            @break
        @endforeach
    @endif
    <label for="password" class="block mb-2 text-xs">Password</label>
    <input wire:model='password' type="password" id="password" placeholder="Password"
        class="input input-sm input-bordered w-full mb-4" />
    <label for="password_confirmation" class="block text-xs mb-2">Password Confirmation</label>
    <input wire:model='password_confirmation' type="password" id="password_confirmation"
        placeholder="Password Confirmation" class="input input-sm input-bordered w-full mb-8" />
    <div class="flex justify-center items-center">
        <button wire:click='updatePassword'
            class="btn mb-2 w-full bg-blue text-white btn-sm max-w-sm">Ubah</button>
    </div>
</div>
</dialog>


<script>
    window.addEventListener('close-modal-update-phone', event => {
        document.getElementById('modalUpdatePhone').close();
    })

    window.addEventListener('close-modal-update-password', event => {
        document.getElementById('modalUpdatePassword').close();
    })

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
