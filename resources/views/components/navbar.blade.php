 <!-- NAVBAR -->
 <nav class="flex justify-between items-center px-10 py-5">
     @if (request()->is('tes/*'))
         <!-- SAAT TEST -->
         <div class="flex items-center gap-3">

             <img src="/images/logo.png" class="w-20 h-20" alt="">

             <span class="text-blue-600 font-semibold text-lg">
                 Prima Solutions
             </span>

         </div>
     @else
         <!-- HALAMAN NORMAL -->
         <a href="/" class="flex items-center gap-3 hover:opacity-80
             transition">

             <img src="/images/logo.png" class="w-20 h-20" alt="">

             <span class="text-blue-600 font-semibold text-lg hover:text-indigo-600 transition">
                 Prima Solutions
             </span>

         </a>
     @endif

     @if (!request()->is('tes/*'))
         <a href="/profile" class="hover:opacity-80 transition">

             <img src="/images/user.png" class="w-10 h-10" alt="">

         </a>
     @endif
 </nav>
