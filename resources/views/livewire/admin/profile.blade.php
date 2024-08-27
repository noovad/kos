<div>
    @section('title', $title ?? '')
    <div class="flex justify-center bg-white drop-shadow-2xl mx-10 rounded-lg mt-4">
        <div class="card p-2 flex flex-col justify-center items-center">
            <div class="avatar placeholder mb">
                <div class="bg-gray-200 text-neutral-content rounded-full w-24">
                    <span class="text-5xl font-bold text-blue">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                </div>
            </div>
            <h3 class="text-xl font-semibold text-blue mb-2">{{ $user->name }}</h3>
            <small class="-m-1 mb-4">Admin</small>
            <div class="max-w-md">
                <p class="mb-2 text-gray-600">Perbarui Data Sistem</p>
                <div class="card border border-grey text-black mt-4 mb-4">
                    <div class="grid grid-cols-7 gap-2 p-2">
                        <div class="col-span-6 rounded-lg">
                            <p class="pl-3 -mb-1">+62 {{ $phone ?? '' }}</p>

                        </div>
                        <div class="col-span-1 flex flex-col justify-center">
                            <button class="btn btn-xs bg-blue text-white border-none"
                                onclick="document.getElementById('modalUpdatePhone').showModal()">Ubah</button>
                        </div>
                    </div>
                </div>
                <div class="card border border-grey text-black mt-4 mb-4">
                    <div class="grid grid-cols-7 gap-2 p-2">
                        <div class="col-span-6 rounded-lg">
                            <p class="pl-3 -mb-1">Generate Tagihan : {{ $notif ?? '' }}</p>

                        </div>
                        <div class="col-span-1 flex flex-col justify-center">
                            <button class="btn btn-xs bg-blue text-white border-none"
                                onclick="document.getElementById('modalUpdateNotif').showModal()">Ubah</button>
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.system-setting', ['name' => 'Deskripsi']) }}"
                    class="btn mb-2 w-full bg-blue text-white btn-sm">Deskripsi</a>
                <a href="{{ route('admin.system-setting', ['name' => 'Fasilitas']) }}"
                    class="btn mb-2 w-full bg-blue text-white btn-sm">Fasilitas</a>
                <a href="{{ route('admin.system-setting', ['name' => 'Aturan']) }}"
                    class="btn mb-2 w-full bg-blue text-white btn-sm">Aturan</a>
                <a href="{{ route('admin.system-setting', ['name' => 'Tentang Kami']) }}"
                    class="btn mb-2 w-full bg-blue text-white btn-sm">Tentang Kami</a>
                    <hr>
                <button class="btn  w-full text-white bg-blue btn-sm mt-4"
                    onclick="document.getElementById('modalUpdatePassword').showModal()">Ganti Password</button>
                <button wire:click='logout' class="btn mb-2 mt-2 w-full bg-blue text-white btn-sm">Logout</button>
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
            <button wire:click='updatePhone' class="btn btn-sm bg-blue text-white me-2 border-none">Ubah</button>
            <button wire:click='closeModal' class="btn btn-sm bg-blue text-white ms-2 border-none">Batal</button>
        </div>
    </div>
</dialog>

<dialog wire:ignore.self id="modalUpdateNotif" class="modal">
    <div class="modal-box w-5/12 max-w-md">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <small class="text-error">{{ $error }}</small><br>
            @break
        @endforeach
    @endif
    <div class="flex mb-8">
        <span class="input input-sm">Waktu :</span>
        <input wire:model='notif' type="time" placeholder="No Telepon"
            class="input input-sm input-bordered w-full" />
    </div>
    <div class="flex justify-center items-center">
        <button wire:click='updateNotif' class="btn btn-sm bg-blue text-white me-2 border-none">Ubah</button>
        <button wire:click='closeModal' class="btn btn-sm bg-blue text-white ms-2 border-none">Batal</button>
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
    <button wire:click='updatePassword' class="btn btn-sm bg-blue text-white ms-2 border-none">Ubah</button>
    <button wire:click='closeModal' class="btn btn-sm bg-blue text-white ms-2 border-none">Batal</button>
</div>
</div>
</dialog>


<script>
    window.addEventListener('close-modal-update-phone', event => {
        document.getElementById('modalUpdatePhone').close();
    })

    window.addEventListener('close-modal-update-notif', event => {
        document.getElementById('modalUpdateNotif').close();
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
