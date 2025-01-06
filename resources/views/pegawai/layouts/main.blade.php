@include('pegawai.partials.start')

    @include('pegawai.partials.notifikasi')
    @include('pegawai.partials.sidebar')

    <div id="main-content"
    class="relative overflow-y-auto md:ml-64 min-h-screen pb-10">
        <main class="relative max-w-full">
            @yield('container')
        <main>


    </div>

{{-- </div> --}}
@include('pegawai.partials.end')
@include('sweetalert::alert')

