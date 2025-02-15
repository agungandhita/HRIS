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

        <form class="font-[sans-serif]" method="POST" action="/vacancy/store">
            @csrf
            <div class="shadow-best bg-white rounded-md justify-between mb-4 border-main3 border-[1px]">
                <div class="p-5 ">
                    <div>
                        <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                            judul
                        </h1>
                        <div class="relative flex items-center">
                            <input type="text" name="title" placeholder="masukan judul lowongan"
                                class="px-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-x-6">

                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Tipe Kerjaan
                            </h1>
                            <div class="relative flex items-center">
                                <select name="type_job"
                                    class="select select-ghost px-4 bg-[#ffffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all capitalize">
                                    <option disabled selected class="text-base">Pilih Tipe Kerja</option>
                                    <option value="full" class="text-base">Penuh Waktu</option>
                                    <option value="shift" class="text-base">Shift</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Status
                            </h1>
                            <div class="relative flex items-center">
                                <select name="level"
                                    class="select select-ghost px-4 bg-[#ffffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all capitalize">
                                    <option disabled selected class="text-base">Pilih Tipe Kerja</option>
                                    <option value="tetap" class="text-base">Tetap</option>
                                    <option value="kontrak" class="text-base">Kontrak</option>
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
                                <input type="text" name="cabang" placeholder="Lamongan"
                                    class="px-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Provinsi
                            </h1>
                            <div class="relative flex items-center">
                                <input type="text" name="provinsi" placeholder="jawa timur"
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
                                <input type="date" name="closing_date"
                                    class="px-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shadow-best bg-white rounded-md justify-between mb-4 border-main3 border-[1px]">


                <div class="p-5">
                    <div>
                        <h1 class="pt-3 md:pt-4 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                            Deskripsi Pekerjaan
                        </h1>
                        <div class="relative flex items-center">
                            <div id="jobDescriptionContainer" class="w-full">
                                <div class="relative flex items-center mb-4 job-description-item">
                                    <textarea name="job_description[]" id="job_description_1"
                                        class="form-control textarea textarea-warning w-full text-lg rounded-lg"
                                        placeholder="Masukkan deskripsi pekerjaan..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-4 mt-4">
                            <button id="addJobDescriptionBtn"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md focus:outline-none hover:bg-blue-600">
                                Tambah Deskripsi
                            </button>
                            <button id="removeJobDescriptionBtn"
                                class="bg-red-500 text-white px-4 py-2 rounded-md focus:outline-none hover:bg-red-600">
                                Hapus Deskripsi
                            </button>
                        </div>
                    </div>
                </div>


                <div class="p-5">
                    <div>
                        <h1 class="md:pt-2 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                            Kualifikasi
                        </h1>
                        <div id="qualifications-container">
                            <div class="relative flex items-center mb-4">
                                <textarea name="qualifications[]" id="qualifications"
                                    class="form-control textarea textarea-warning w-full text-lg rounded-lg"
                                    placeholder="Masukkan kualifikasi..."></textarea>
                            </div>
                        </div>
                        <div class="flex space-x-4 mt-4">
                            <button type="button" id="add-qualification"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                Tambah Kualifikasi
                            </button>
                            <button type="button" id="remove-qualification"
                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                Hapus Kualifikasi
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mr-4">
                    <button type="submit"
                        class="mb-4 px-4 py-2 text-lg font-semibold w-40 bg-yellow-400 hover:bg-yellow-600 text-white rounded transition-all">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection
