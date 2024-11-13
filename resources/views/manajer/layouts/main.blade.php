@include('manajer.partials.start')

{{-- @include('admin.partials.navbar') --}}
{{-- <div class="md:flex overflow-hidden dark:bg-gray-900"> --}}
    
    @include('manajer.partials.sidebar')
    
    <div id="main-content"
    class="relative overflow-y-auto md:ml-64  px-4 min-h-screen pb-10">
        <main class="relative max-w-full">
            @yield('container')
        <main>


    </div>

{{-- </div> --}}
@include('manajer.partials.end')
@include('sweetalert::alert')

