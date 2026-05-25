<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-[#F5F6FA] font-sans">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">

            <!-- LOGO -->
            <div class="px-8 py-8 border-b border-gray-100">

                <h1 class="text-3xl font-bold text-black-600 leading-tight">

                    Admin <br>
                    Psikologi

                </h1>

            </div>

            <!-- MENU -->
            <nav class="flex-1 px-4 py-8">

                <div class="space-y-3">

                    <!-- DASHBOARD -->
                    <a href="/admin"
                        class="block px-5 py-4 rounded-2xl transition font-medium

   {{ request()->is('admin') ? 'bg-indigo-600 text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">

                        Dashboard

                    </a>

                    <!-- RIWAYAT -->
                    <a href="/admin/results"
                        class="block px-5 py-4 rounded-2xl transition font-medium

   {{ request()->is('admin/results*') ? 'bg-indigo-600 text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">

                        Data Riwayat Tes

                    </a>

                    <!-- SELF CARE -->
                    <a href="/admin/self-care"
                        class="block px-5 py-4 rounded-2xl transition font-medium

   {{ request()->is('admin/self-care*') ? 'bg-indigo-600 text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">

                        Self-Care

                    </a>
                </div>

            </nav>

            <!-- LOGOUT -->
            <div class="p-4 border-t border-gray-100">

                <form action="/logout" method="POST">

                    @csrf

                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2
                               px-4 py-3 rounded-xl
                               bg-red-500 text-white
                               hover:bg-red-600
                               transition">

                        Logout

                    </button>

                </form>

            </div>

        </aside>

        <!-- MAIN -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            <header class="bg-white border-b border-gray-200 px-10 py-5">

                <div class="flex items-center justify-between">

                    <!-- TITLE -->
                    <div>

                        <h2 class="text-2xl font-bold text-gray-800">
                            Dashboard
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            Selamat datang kembali Admin 😄
                        </p>

                    </div>

                    <!-- PROFILE -->
                    <!-- PROFILE -->
                    <div class="relative group">

                        <!-- BUTTON -->
                        <button
                            class="flex items-center gap-4
               hover:bg-gray-100
               px-3 py-2 rounded-xl
               transition">

                            <!-- AVATAR -->
                            <img src="/images/admin-profile.jpg"
                                class="w-12 h-12 rounded-full object-cover border-2 border-indigo-200">

                            <!-- INFO -->
                            <div class="text-right">

                                <h3 class="font-semibold text-gray-800">
                                    {{ Auth::user()->name }}
                                </h3>

                                <p class="text-sm text-gray-400">
                                    Administrator
                                </p>

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

                                <a href="#"
                                    class="block px-4 py-3 rounded-xl
                      text-gray-700
                      hover:bg-indigo-50
                      hover:text-indigo-600
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
