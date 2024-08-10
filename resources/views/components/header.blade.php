<div class="navbar mx-auto max-w-lg max-h-16 bg-blue drop-shadow-down fixed z-50">
    <div class="navbar-start pl-3">
        <!-- <button class="btn bg-bluebg btn-circle btn-xs border-none" onclick="goBack()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue border-none" fill="currentColor"
                class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
            </svg>
        </button> -->
    </div>
    <div class="navbar-center text-white">
        <h4>@yield('judul')</h4>
    </div>
    <div class="navbar-end">

    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>
