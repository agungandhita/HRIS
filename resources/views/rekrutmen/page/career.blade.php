@extends('rekrutmen.layouts.main')

@section('container')
    <div class="before:z-10 object-contain before:absolute before:w-full before:h-full before:inset-0">
        <img src="{{ asset('bahan/rekrut.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="Banner Image">
        <div
            class="min-h-[280px] relative z-20 max-w-6xl mx-auto flex flex-col justify-end items-end text-center p-6 mb-24 mt-2 md:mt-20">
            <h2 class="text-yellow-400 stroke-2 text-2xl md:text-4xl font-bold mb-6 capitalize">mari bergabung dengan kita
            </h2>
            <button type="button"
                class="px-3 py-2 md:px-6 md:py-3 rounded-full text-white text-xl tracking-wider font-semibold outline-none bg-orange-600 hover:bg-orange-700 border-2 border-orange-600 transition-all duration-300">Getting
                started now</button>
        </div>

        <div class="bg-white relative z-20 mx-auto  w-full rounded-t-2xl min-h-[380px]">
                <div class="mx-auto pt-7 mb-10 lg:mb-14 container">
                    <h2 class="text-2xl font-extrabold md:text-5xl md:leading-tight dark:text-white italic">RECENT VACANCY
                    </h2>
                    <div class="mt-1 w-64 h-3 bg-gradient-to-r from-red-900"></div>
                </div>
            <div class="md:flex md:flex-nowrap">
                <div
                    class="bg-white border border-px shadow-best w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold">Heading</h3>
                        <p class="mt-2 text-sm text-gray-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Sed auctor auctor
                            arcu, at fermentum dui. Maecenas</p>
                        <button type="button"
                            class="mt-4 px-5 py-2.5 rounded-lg text-white text-sm tracking-wider border-none outline-none bg-blue-600 hover:bg-blue-700">View</button>
                    </div>
                </div>
                <div
                    class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold">Heading</h3>
                        <p class="mt-2 text-sm text-gray-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Sed auctor auctor
                            arcu, at fermentum dui. Maecenas</p>
                        <button type="button"
                            class="mt-4 px-5 py-2.5 rounded-lg text-white text-sm tracking-wider border-none outline-none bg-blue-600 hover:bg-blue-700">View</button>
                    </div>
                </div>
                <div
                    class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold">Heading</h3>
                        <p class="mt-2 text-sm text-gray-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Sed auctor auctor
                            arcu, at fermentum dui. Maecenas</p>
                        <button type="button"
                            class="mt-4 px-5 py-2.5 rounded-lg text-white text-sm tracking-wider border-none outline-none bg-blue-600 hover:bg-blue-700">View</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
