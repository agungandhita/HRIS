@extends('admin.layouts.main')

@section('container')
    <section>
        @include('admin.dashboard._header')

        {{-- isi --}}
        <div class="pt-24">
            <div class="shadow-best bg-white rounded-md justify-between mb-4 border-main3 border-[1px]">
                <div class="flex">
                    <p class="text-4xl font-semibold py-4 mx-4 text-blue-500">
                        Hallo, {{ auth()->user()->role }}
                    </p>
                    <img src="{{ asset('img/hello.png') }}" class="object-contain w-16 justify-end" alt="">
                </div>
    
                <p class="text-3xl font-serif pb-4 mx-4 uppercase text-black">
                    selamat datang di dashboard admin 
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                <div class="bg-white border-[1px] border-main3 rounded-md h-36">
                    <div class="flex justify-between p-3">
                        <div class="pt-4">
                            <h1 class="font-bold text-2xl">
                                Manajer
                            </h1>
                            <h1 class="font-semibold text-4xl pt-4 text-gray-500">
                                {{ $manajer }}
                            </h1>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 md:w-32" viewBox="0 0 24 24" fill="currentColor"><path d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-[1px] border-main3 rounded-md h-36">

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

    </section>
@endsection
