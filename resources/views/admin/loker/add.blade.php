@extends('admin.layouts.main')

@section('container')
    @include('admin.dashboard._header')

    <div class="pt-24">
        <div class="shadow-best bg-white rounded-md justify-between mb-2 md:mb-4 border-main3 border-[1px]">
            <div class="flex">
                <p class="text-xl md:text-4xl font-semibold py-4 mx-4 text-yellow-400 capitalize">
                    buat lamaran disini
                </p>
            </div>
            <div class="mx-4">
                <p class="text-lg md:text-2xl font-semibold mb-2 capitalize">
                    pastikan data lowongan sesuai dengan yang di butuhkan
                </p>
            </div>
        </div>

        <div class="shadow-best bg-white rounded-md justify-between mb-4 border-main3 border-[1px]">
            <div class="p-5 ">
                <form class="font-[sans-serif]">
                    <div class="grid md:grid-cols-2 gap-x-6">
                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                judul
                            </h1>
                            <div class="relative flex items-center">
                                <input type="text" name="title" placeholder="masukan judul lowongan"
                                    class="px-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Tipe Kerjaan
                            </h1>
                            <div class="relative flex items-center">
                                <select name="level"
                                    class="select select-ghost px-4 bg-[#ffffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all">
                                    <option disabled selected class="text-base">Pilih Tipe Kerja</option>
                                    <option class="text-base">Tetap</option>
                                    <option class="text-base">Kontrak</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-x-6">
                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Cabang
                            </h1>
                            <div class="relative flex items-center">
                                <input type="text" name="title" placeholder="Lamongan"
                                    class="px-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Provinsi
                            </h1>
                            <div class="relative flex items-center">
                                <input type="text" name="title" placeholder="jawa timur"
                                    class="px-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>
                    </div>


                    <div class="grid md:grid-cols-2 gap-x-6">
                        <div>
                            <h1 class="pt-3 md:pt-4 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                mulai
                            </h1>
                            <div class="relative flex items-center">
                                <input type="date" name="posting_date" placeholder="First Name"
                                    class="px-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-4 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Sampai
                            </h1>
                            <div class="relative flex items-center">
                                <input type="date" name="closing_date" placeholder="First Name"
                                    class="px-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>
                    </div>

                        <div>
                            <h1 class="pt-3 md:pt-4 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                deskripsi pekerjaan
                            </h1>
                            <div class="relative flex items-center">
                               <textarea name="" id="" cols="10" rows="10" class="w-full text-lg">

                               </textarea>
                                
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-4 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Kualifikasi
                            </h1>
                            <div class="relative flex items-center">
                               <textarea name="" id="" cols="10" rows="10" class="w-full text-lg">

                               </textarea>
                                
                            </div>
                        </div>


                    <div class="flex justify-end">
                        <button type="submit"
                            class="mt-8 px-4 py-2 text-lg font-semibold w-40 bg-yellow-400 hover:bg-yellow-600 text-white rounded transition-all">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
