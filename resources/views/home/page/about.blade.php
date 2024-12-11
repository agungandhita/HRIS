@extends('home.layouts.main')

@section('container')
    <div class="before:z-10 object-contain before:absolute before:w-full before:h-full before:inset-0">
        <img src="{{ asset('bahan/Banner02.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-80"
            alt="Banner Image">
        <div
            class="min-h-[280px] relative z-20 max-w-6xl mx-auto flex flex-col justify-center items-center text-center p-6 mb-16 md:mb-40 mt-2 md:mt-20 ">
            <h2 class="text-yellow-300 text-2xl md:text-6xl font-bold font-[sans-serif] mb-6 ">
                Lebih dari Sekadar Restoran, Ini Adalah Pengalaman!
            </h2>
            <p class="text-black font-bold text-sm sm:text-xl mt-4">
                Kami tidak hanya menyajikan makanan lezat, tetapi juga menghadirkan pengalaman budaya Jepang yang otentik,
                penuh kehangatan, dan inovasi. Resto Jepang Kekinian adalah tempat di mana rasa, cerita, dan momen bersatu.
            </p>
        </div>
        <div class="bg-white relative z-20 mx-auto w-full rounded-t-3xl min-h-[380px] pb-10">
            <div class="mx-auto pt-7 mb-10 lg:mb-14 px-5">
                <h2 class="text-2xl font-extrabold md:text-5xl md:leading-tight dark:text-white italic">tentang kami
                </h2>
                <div class="mt-1 w-64 h-3 bg-gradient-to-r from-red-900"></div>
            </div>
            <div class="md:max-w-full px-5 sm:px-6 lg:px-12 lg:pt-1 mx-auto border-b">
                <div class="flex flex-col sm:flex-row gap-x-8">
                    <div class="w-full md:w-6/12 lg:w-5/12">
                        <img src="{{ asset('bahan/about.jpg') }}" alt="" class="object-contain w-full rounded-2xl">
                    </div>
                    <div class="p-4 flex flex-col md:my-16 h-full sm:px-9 sm:py-0">
                        <h1 class="text-xl md:text-2xl lg:text-4xl font-bold text-gray-800 dark:text-white">
                            Restoran kami memberikan pelayan yang terbaik untuk kepuasan pelanggan.
                        </h1>
                        <p class="mt-3 text-gray-800 dark:text-gray-400">
                            Menggunakan bahan-bahan terbaik dan
                            Menyajikan hidangan dengan cinta dan keahlian yang tinggi. serta
                            Memberikan pelayanan terbaik untuk setiap pelanggan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="md:max-w-full px-5 sm:px-6 lg:px-12  mx-auto bg-gray-200 mt-8">
                <div class="flex flex-col sm:flex-row gap-x-8">
                    <div class="p-4 flex flex-col md:my-16 h-full sm:px-9 sm:py-0">
                        <h1 class="text-xl md:text-2xl lg:text-4xl font-bold text-gray-800 dark:text-white">
                            Kenapa Memilih Kami?
                        </h1>
                        <p class="mt-3 text-gray-800 dark:text-gray-400">
                            Kami adalah destinasi yang lebih dari sekadar tempat makan; kami adalah perwujudan dari keinginan untuk memberikan pengalaman kuliner terbaik yang tak hanya memanjakan selera tetapi juga menyentuh hati. <br> Dengan setiap langkah kecil yang kami ambil, kami berusaha menciptakan perpaduan sempurna antara cita rasa tradisional Jepang yang kaya akan sejarah dan budaya, dengan inovasi modern yang relevan dengan selera masa kini.
                        </p>
                    </div>
                    <div class="w-full md:w-6/12 lg:w-5/12">
                        <img src="{{ asset('bahan/14.jpg') }}" alt="" class="object-contain w-full rounded-2xl">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
