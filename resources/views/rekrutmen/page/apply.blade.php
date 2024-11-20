@extends('rekrutmen.layouts.main')

@section('container')
    <div class="before:z-10 object-contain before:absolute before:w-full before:h-full before:inset-0">
        <img src="{{ asset('bahan/career.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-90"
            alt="Banner Image">
        <div
            class="min-h-[280px] relative z-20 max-w-6xl mx-auto flex flex-col justify-center items-center text-center p-6 mb-16 md:mb-40 mt-2 md:mt-20 ">
            <h2
                class="text-yellow-400 stroke-2 text-2xl md:text-6xl font-bold font-[sans-serif] stroke-slate-950 mb-6 capitalize">
                Karir Anda
                Dimulai Dari Sini
            </h2>
            <p class="text-white font-bold text-sm sm:text-xl mt-4">
                Kami percaya bahwa untuk dapat menghasilkan karya terbaik, kami membutuhkan profesional muda yang memiliki
                integritas tinggi, antusias melakukan perubahan.
            </p>
        </div>
    </div>

    <div class="bg-white relative z-20 mx-auto w-full rounded-t-3xl min-h-[380px] pb-10">

        <div class="md:max-w-full px-4 py-10 sm:px-6 lg:px-12 lg:pt-20 mx-auto border-b">
            <h1 class="text-2xl md:text-4xl font-semibold capitalize">
                {{ $loker->title }}
            </h1>
        </div>
    </div>
@endsection
