@extends('manajer.layouts.main')

@section('container')
@include('admin.dashboard._header')

<div class="pt-24">
    <div class="shadow-best bg-white rounded-md justify-between mb-4 border-main3 border-[1px]">
        <div class="flex">
            <p class="text-4xl font-semibold py-4 mx-4 text-blue-500">
                Hallo, {{ auth()->user()->nama }}
            </p>
            <img src="" class="object-contain w-16 justify-end" alt="">
        </div>

        <p class="text-2xl font-serif pb-4 mx-4 uppercase text-black">

            selamat datang manajer di Cabang {{ auth()->user()->kota }}
        </p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="bg-white border-[1px] border-main3 rounded-md h-36">
            <div class="flex justify-between p-3">
                <div class="pt-4">
                    <h1 class="font-bold text-2xl">
                        Total Pegawai
                    </h1>
                    <h1 class="font-semibold text-4xl pt-4 text-gray-500">
                        {{-- {{ $manajer }} --}}
                    </h1>
                </div>
                <div class="mt-4 md:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 md:w-24" viewBox="0 0 24 24" fill="currentColor"><path d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white border-[1px] border-main3 rounded-md h-36">
            <div class="flex justify-between p-3">
                <div class="pt-4">
                    <h1 class="font-bold text-2xl">
                        Total Pendapatan
                    </h1>
                    <h1 class="font-semibold text-4xl pt-4 text-gray-500">
                        {{-- {{ $manajer }} --}}
                    </h1>
                </div>
                <div class="mt-4 md:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 md:w-24" viewBox="0 0 24 24" fill="currentColor"><path d="M12.0049 22.0027C6.48204 22.0027 2.00488 17.5256 2.00488 12.0027C2.00488 6.4799 6.48204 2.00275 12.0049 2.00275C17.5277 2.00275 22.0049 6.4799 22.0049 12.0027C22.0049 17.5256 17.5277 22.0027 12.0049 22.0027ZM12.0049 20.0027C16.4232 20.0027 20.0049 16.421 20.0049 12.0027C20.0049 7.58447 16.4232 4.00275 12.0049 4.00275C7.5866 4.00275 4.00488 7.58447 4.00488 12.0027C4.00488 16.421 7.5866 20.0027 12.0049 20.0027ZM8.50488 14.0027H14.0049C14.281 14.0027 14.5049 13.7789 14.5049 13.5027C14.5049 13.2266 14.281 13.0027 14.0049 13.0027H10.0049C8.62417 13.0027 7.50488 11.8835 7.50488 10.5027C7.50488 9.12203 8.62417 8.00275 10.0049 8.00275H11.0049V6.00275H13.0049V8.00275H15.5049V10.0027H10.0049C9.72874 10.0027 9.50488 10.2266 9.50488 10.5027C9.50488 10.7789 9.72874 11.0027 10.0049 11.0027H14.0049C15.3856 11.0027 16.5049 12.122 16.5049 13.5027C16.5049 14.8835 15.3856 16.0027 14.0049 16.0027H13.0049V18.0027H11.0049V16.0027H8.50488V14.0027Z"></path></svg>
                </div>
            </div>

        </div>

        <div class="bg-white border-[1px] border-main3 rounded-md h-36">

        </div>

        <div class="bg-white border-[1px] border-main3 rounded-md h-36">

        </div>
    </div>

    <div class="grid gap-4 grid-cols-1 lg:grid-cols-2 mt-4">
        <div class="bg-white border-[1px] border-main3 rounded-md h-[400px]">

        </div>
        <div class="bg-white border-[1px] border-main3 rounded-md h-[400px]">

        </div>
    </div>

    <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-4">
        <div class="bg-white border-[1px] border-main3 rounded-md h-[200px]">

        </div>
        <div class="bg-white border-[1px] border-main3 rounded-md h-[200px]">

        </div>
        <div class="bg-white border-[1px] border-main3 rounded-md h-[200px]">

        </div>
        <div class="bg-white border-[1px] border-main3 rounded-md h-[200px]">

        </div>
        <div class="bg-white border-[1px] border-main3 rounded-md h-[200px]">

        </div>
        <div class="bg-white border-[1px] border-main3 rounded-md h-[200px]">

        </div>
    </div>

    <div class="bg-white border-[1px] border-main3 rounded-md h-[400px] w-full mt-4">

    </div>
</div>

@endsection
