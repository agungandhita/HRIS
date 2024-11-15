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
            <div class="p-5">
                <form class="font-[sans-serif]">
                    <div class="grid md:grid-cols-2 gap-x-6">
                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                judul
                            </h1>
                            <div class="relative flex items-center">
                                <input type="text" placeholder="First Name"
                                    class="px-4 py-3 bg-[#f0f1f2] focus:bg-transparent text-black w-full text-sm border outline-[#007bff] rounded transition-all" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                judul
                            </h1>
                            <div class="relative flex items-center">
                                <input type="text" placeholder="First Name"
                                    class="px-4 py-3 bg-[#f0f1f2] focus:bg-transparent text-black w-full text-sm border outline-[#007bff] rounded transition-all" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-x-6">
                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                mulai
                            </h1>
                            <div class="relative flex items-center">
                                <input type="date" placeholder="First Name"
                                class="px-2 bg-[#f0f1f2] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Sampai
                            </h1>
                            <div class="relative flex items-center">
                                <input type="date" placeholder="First Name"
                                    class="px-2 bg-[#f0f1f2] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded transition-all" />
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-x-6">
                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                judul
                            </h1>
                            <div class="relative flex items-center">
                                <input type="text" placeholder="First Name"
                                    class="px-4 py-3 bg-[#f0f1f2] focus:bg-transparent text-black w-full text-sm border outline-[#007bff] rounded transition-all" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>

                        <div>
                            <h1 class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                judul
                            </h1>
                            <div class="relative flex items-center">
                                <input type="text" placeholder="First Name"
                                    class="px-4 py-3 bg-[#f0f1f2] focus:bg-transparent text-black w-full text-sm border outline-[#007bff] rounded transition-all" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
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
