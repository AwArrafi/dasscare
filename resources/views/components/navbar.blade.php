<!-- NAVBAR -->
<nav
    class="sticky top-0 z-50
    bg-white
    border-b border-gray-100
    shadow-sm
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
        @auth
            <!-- SUDAH LOGIN: ICON PROFILE -->
            <a href="/profile"
                class="flex items-center justify-center
            w-12 h-12 md:w-11 md:h-11
            rounded-full
            bg-white/20
            hover:bg-white/30
            transition
            overflow-hidden">

                <img src="/images/user.png" class="w-10 h-10 md:w-10 md:h-10 object-contain" alt="Profile">

            </a>
        @else
            <!-- BELUM LOGIN: TEXT LOGIN -->
            <a href="/login"
                class="inline-flex items-center justify-center
            px-4 md:px-5
            py-2 md:py-2.5
            text-blue-600
            hover:text-indigo-600
            text-s md:text-sm
            font-semibold
            transition
            whitespace-nowrap">

                Login

            </a>
        @endauth
    @endif

</nav>
