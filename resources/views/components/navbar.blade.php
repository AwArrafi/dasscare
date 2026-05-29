<!-- NAVBAR -->
<nav
    class="sticky top-0 z-50
    bg-white/80 backdrop-blur-md
    border-b border-gray-100
    flex items-center justify-between
    px-4 sm:px-6 md:px-10
    py-4">

    @if (request()->is('tes/*'))
        <!-- SAAT TEST -->
        <div class="flex items-center gap-2 sm:gap-3">

            <img src="/images/logo.png" class="w-14 h-14 md:w-16 md:h-16 object-contain" alt="Logo">

            <span
                class="text-blue-600
                font-semibold
                text-base md:text-lg
                leading-none">

                Prima Solutions

            </span>

        </div>
    @else
        <!-- HALAMAN NORMAL -->
        <a href="/" class="flex items-center gap-2 sm:gap-3
            hover:opacity-80 transition">

            <img src="/images/logo.png" class="w-14 h-14 md:w-16 md:h-16 object-contain" alt="Logo">

            <span
                class="text-blue-600
                font-semibold
                text-base md:text-lg
                hover:text-indigo-600
                transition
                leading-none">

                Prima Solutions

            </span>

        </a>
    @endif

    @if (!request()->is('tes/*'))
        <a href="/profile"
            class="flex items-center justify-center
            w-10 h-10 md:w-11 md:h-11
            rounded-full
            hover:bg-gray-100
            transition">

            <img src="/images/user.png" class="w-9 h-9 md:w-10 md:h-10" alt="Profile">

        </a>
    @endif

</nav>
