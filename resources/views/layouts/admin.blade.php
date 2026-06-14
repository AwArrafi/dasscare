<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5F6FA] font-sans">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside style="background-color: #4A3388;" class="w-64 border-r border-white/10 flex flex-col shadow-sm">

            <!-- LOGO -->
            <div class="px-8 py-8">

                <h1 class="text-3xl font-bold text-white leading-tight tracking-wide">
                    ADMIN
                </h1>

            </div>

            <!-- MENU -->
            <nav class="flex-1 px-4 py-8">

                <div class="space-y-3">

                    <!-- DASHBOARD -->
                    <a href="/admin"
                        class="block px-5 py-4 rounded-2xl transition font-semibold
                       {{ request()->is('admin') ? 'bg-white text-[#4A3388] shadow-sm' : 'text-white hover:bg-white/15' }}">

                        Dashboard

                    </a>

                    <!-- RIWAYAT -->
                    <a href="/admin/results"
                        class="block px-5 py-4 rounded-2xl transition font-semibold
                        {{ request()->is('admin/results*') ? 'bg-white text-[#4A3388] shadow-sm' : 'text-white hover:bg-white/15' }}">

                        Data Riwayat Tes

                    </a>

                    <!-- SELF CARE -->
                    <a href="/admin/self-care"
                        class="block px-5 py-4 rounded-2xl transition font-semibold
                       {{ request()->is('admin/self-care*') ? 'bg-white text-[#4A3388] shadow-sm' : 'text-white hover:bg-white/15' }}">

                        Self-Care

                    </a>

                </div>

            </nav>

            <!-- LOGOUT -->
            <div class="p-4">
                <form action="/logout" method="POST">

                    @csrf

                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2
                        px-4 py-3 rounded-xl
                        bg-white text-red-500
                        hover:bg-red-50
                        font-semibold
                        transition">

                        Logout

                    </button>

                </form>

            </div>

        </aside>

        <!-- MAIN -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            <header style="background-color: #4A3388;" class=" px-10 py-5 shadow-sm">
                <div class="flex items-center justify-between">

                    <!-- TITLE -->
                    <div>
                        <h2 class="text-2xl font-bold text-white">
                            DASHBOARD
                        </h2>
                    </div>

                    <!-- PROFILE -->
                    <div class="relative group">

                        <!-- BUTTON -->
                        <button class="flex items-center gap-4 hover:bg-white/15 px-3 py-2 rounded-xl transition">

                            <!-- AVATAR -->
                            <img src="/images/admin-profile.jpg"
                                class="w-12 h-12 rounded-full object-cover border-2 border-white/40"
                                alt="Admin Profile">

                            <!-- INFO -->
                            <div class="text-right">

                                <h3 class="font-semibold text-white">
                                    {{ Auth::user()->name ?? 'Admin' }}
                                </h3>
                            </div>

                        </button>

                        <!-- DROPDOWN -->
                        <div
                            class="absolute right-0 mt-2 w-48
                            bg-white rounded-2xl shadow-xl
                            border border-gray-100
                            opacity-0 invisible
                            group-hover:opacity-100
                            group-hover:visible
                            transition-all duration-200 z-50">

                            <!-- MENU -->
                            <div class="p-2">

                                <a href="/profile"
                                    class="block px-4 py-3 rounded-xl
                                    text-gray-700
                                    hover:bg-purple-50
                                    hover:text-purple-700
                                    transition">

                                    👤 Profile

                                </a>

                                <form action="/logout" method="POST">

                                    @csrf

                                    <button type="submit"
                                        class="w-full text-left px-4 py-3 rounded-xl
                                        text-red-500
                                        hover:bg-red-50
                                        transition">

                                        🚪 Logout

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </header>

            <!-- CONTENT -->
            <main class="flex-1 p-10">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>
