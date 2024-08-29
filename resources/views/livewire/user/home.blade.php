<div>
    @section('title', $title ?? '')

    <div class="flex justify-center" style="scale: 1/1">
        <img src="{{ asset('asset/icon_login.png') }}" class="lg:px-40 px-28" alt="">
    </div>
    <button id="addToHomeScreenBtn" class="btn mx-5 btn-xs bg-blue text-white" hidden>Install on Phone</button>
    <button id="install" class="btn mx-5 btn-xs bg-blue text-white" hidden>Install</button>
    <div class="px-5 pb-8">
        {!! $data->value !!}
    </div>
    <div class="flex justify-center px-4 pt-4 text-black">
        <div class="grid grid-cols-2 gap-6 w-full sm:px-20 px-8">
            <div class="card">
                <a href="{{ route('user.room-index') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-bed-double text-blue">
                            <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8" />
                            <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4" />
                            <path d="M12 4v6" />
                            <path d="M2 18h20" />
                        </svg>
                        <small class="text-center text-blue">Kamar</small>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('user.facility') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-notebook-pen text-blue">
                            <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                            <path d="M2 6h4" />
                            <path d="M2 10h4" />
                            <path d="M2 14h4" />
                            <path d="M2 18h4" />
                            <path
                                d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                        </svg>
                        <small class="text-center text-blue">Fasilitas</small>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('user.rule') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-book-marked text-blue">
                            <path d="M10 2v8l3-3 3 3V2" />
                            <path
                                d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                        </svg>
                        <small class="text-center text-blue">Aturan</small>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('user.about') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-users text-blue">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        <small class="text-center text-blue truncate">Tentang Kami</small>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script>
        let installPrompt = null;
        const installButton = document.querySelector("#install");

        // Awalnya sembunyikan tombol secara eksplisit untuk menghindari konflik dengan CSS
        installButton.style.display = "none";

        window.addEventListener("beforeinstallprompt", (event) => {
            event.preventDefault();
            installPrompt = event;
            installButton.removeAttribute("hidden");
            installButton.style.display = "block"; // Pastikan tombol muncul
        });

        installButton.addEventListener("click", async () => {
            if (!installPrompt) {
                return;
            }
            installPrompt.prompt();
            const {
                outcome
            } = await installPrompt.userChoice;
            console.log(`Install prompt was: ${outcome}`);
            disableInAppInstallPrompt();
        });

        function disableInAppInstallPrompt() {
            installPrompt = null;
            installButton.setAttribute("hidden", "");
            installButton.style.display = "none"; // Sembunyikan kembali tombol
        }
    </script>
</div>
