<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen -translate-x-full bg-Sidebar md:translate-x-0 transition-all duration-500"
    aria-label="Sidebar">
    {{-- logo area --}}
    <div class="h-20 mb-2 border-b-[4px] border-white px-3 relative">
        <div class="absolute top-[50%] -translate-y-[50%] p-2">
            {{-- <img src="{{ asset('img/logo.png') }}" alt="" class="object-contain w-7 h-7 my-auto"> --}}
            <h1 class="font-semibold text-white text-[30px] my-auto ">Pegawai</h1>
        </div>
    </div>

    <div class="h-full px-3 pb-[290px] grid grid-cols-1 gap-4 overflow-y-auto p-4 bg-Sidebar relative w-64 scrollbar">
        <ul class="space-y-2 font-medium">
            <h1 class="text-yellow-400 text-lg font-bold capitalize">Menu</h1>
            <li>
                <a href="/admin" class="flex items-center p-2 text-white rounded-lg group hover:underline">
                    <svg class="w-5 h-5 fill-white transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ml-3 font-semibold">absensi</span>
                </a>
            </li>

            {{-- menu bawa --}}
            <div class="fixed w-64 bottom-0 bg-Sidebar left-0 pt-2 px-3 pb-4 h-[195px]">

                <div class="flex items-center p-2 text-white rounded-lg group hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-5 h-5 fill-green-500  transition duration-75"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                    </svg>

                    <span class="ml-3 font- text-green-500">Settings</span>

                </div>

                <div class="flex items-center p-2 text-white rounded-lg group hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-5 h-5 fill-yellow-400  transition duration-75"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                    </svg>

                    <span class="ml-3 font-semibold text-yellow-400">Help & Support</span>

                </div>
                <form action="/logout" method="POST">
                    @csrf
                    <div
                        class="flex items-center mb-2 p-2 bg-red-600 cursor-pointer hover:bg-red-700 rounded-lg text-white group hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-5 h-5 fill-white  transition duration-75"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                        </svg>
                        <button type="submit">
                            <span class="ml-3 font-semibold">Logout</span>
                        </button>
                    </div>
                </form>
                <div class="max-h-[50px] h-full w-full border-t-[1px] border-main2 flex gap-x-3 pt-2">
                    <div class="my-auto">
                        <h1 class="text-lg text-white font-bold">{{ Auth::guard('pegawai')->user()->nama }}</h1>
                        <h1 class="text-lg text-white font-bold">{{ Auth::guard('pegawai')->user()->posisi }}</h1>
                    </div>
                </div>
            </div>
    </div>
</aside>



@push('scripts')
    <script>
        var dropdownSidebar = document.querySelectorAll('.dropdownSidebar');
        var arrowSidebar = document.querySelectorAll('.arrowSidebar');

        dropdownSidebar.forEach(function(element, index) {
            element.addEventListener('click', function() {
                arrowSidebar[index].classList.toggle('rotate-180');
            });
        });
    </script>
@endpush
