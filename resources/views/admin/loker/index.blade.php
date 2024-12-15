@extends('admin.layouts.main')

@section('container')
    @include('admin.dashboard._header')
    <div class="pt-20">
        <div
            class="p-4 bg-white block sm:flex items-center justify-between border-1px shadow-xl border-gray-300 rounded-xl border-[2px] lg:mt-1.5 lg:mb-7">
            <div class="w-full mb-1 font-[sans-serif]">
                <div class="mb-4">
                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                            <a href="#" class="inline-flex items-center text-gray-700 hover:text-primary-600">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="#" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2">Loker</a>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 " aria-current="page">List</span>
                            </div>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl capitalize">data loker</h1>
                </div>
                <div class="md:flex">
                    <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">
                        <form class="lg:pr-3" action="#" method="GET">
                            <label for="users-search" class="sr-only">Search</label>
                            <div class="flex flex-col sm:flex-row gap-2 md:gap-x-4">
                                <div class="relative mt-1 lg:w-64 xl:w-96">
                                    <input type="text" name="email" id="users-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Cari Loker">
                                </div>
                                <div class="flex gap-2">
                                    <!-- Tombol Search -->
                                    <button type="submit" class="border-2 bg-blue-600 hover:bg-blue-800 rounded-lg">
                                        <h1 class="py-1 px-3 text-white font-semibold">
                                            Search
                                        </h1>
                                    </button>

                                    <!-- Tombol Undo -->
                                    <button type="submit" class="border-2 bg-red-600 hover:bg-red-800 rounded-lg">
                                        <h1 class="py-1 px-3 text-white font-semibold">
                                            Undo
                                        </h1>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <a href="/vacancy/add"
                            class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-semibold text-center text-white bg-blue-600 border border-gray-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mr-2 -ml-1"
                                fill="currentColor">
                                <path
                                    d="M15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11 11V8H13V11H16V13H13V16H11V13H8V11H11Z">
                                </path>
                            </svg>
                            Tambah
                        </a>
                        {{-- <a href="#"
                            class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-semibold text-center text-white bg-green-600 border border-gray-300 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Export
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 bg-white rounded-2xl shadow-xl">
            <div class="font-[sans-serif] overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 whitespace-nowrap">
                        <tr>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Loker
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Lokasi
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Level
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                tanggal posting
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                status
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Job Desc dan Kualifikasi
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap font-[sans-serif] text-semibold">
                        @foreach ($data as $no => $item)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $no + 1 }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    {{ $item->title }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    {{ $item->cabang }}, {{ $item->provinsi }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    {{ $item->level }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    {{ \Carbon\Carbon::parse($item->posting_date)->translatedFormat('l, d F Y') }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    <span
                                        class="{{ $item->status == 'open' ? 'text-green-500' : ($item->status == 'closed' ? 'text-red-500' : 'text-gray-800') }}">
                                        {{ $item->status }}
                                    </span>
                                </td>

                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <button type="button"
                                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent text-blue-700 hover:underline"
                                        aria-haspopup="dialog{{ $no }}" aria-expanded="false"
                                        aria-controls="hs-scroll-inside-body-modal{{ $no }}"
                                        data-hs-overlay="#hs-scroll-inside-body-modal{{ $no }}">
                                        Lihat Detail
                                    </button>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <button type="button" data-modal-target="default-modal{{ $no }}"
                                        data-modal-toggle="default-modal{{ $no }}" class="text-blue-600 mr-4">
                                        Edit</button>
                                    <button aria-haspopup="dialog{{ $no }}" aria-expanded="false"
                                        aria-controls="hs-scale-animation-modal{{ $no }}"
                                        data-hs-overlay="#hs-scale-animation-modal{{ $no }}"
                                        class="text-red-600">Delete</button>
                                </td>
                            </tr>

                            {{-- delet modal --}}
                            @foreach ($data as $isi => $delete)
                                <div id="hs-scale-animation-modal{{ $isi }}"
                                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                                    role="dialog" tabindex="-1"
                                    aria-labelledby="hs-scale-animation-modal-label{{ $isi }}">
                                    <form action="{{ route('vacancy.delete', $delete->vacancy_id) }}" method="POST">
                                        @csrf
                                        <div
                                            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                                            <div
                                                class="w-full flex flex-col bg-slate-100 border shadow-sm rounded-xl pointer-events-auto ">
                                                <div class="flex justify-between items-center py-3 px-4 border-b ">
                                                    <h3 id="hs-scale-animation-modal-label"
                                                        class="font-bold text-gray-800 ">
                                                        Hapus
                                                    </h3>
                                                </div>
                                                <div class="p-4 overflow-y-auto">
                                                    <p class="mt-1 text-gray-800 font-semibold">
                                                        Apakah anda yakin ingin menghapus?
                                                    </p>
                                                </div>
                                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t ">
                                                    <button type="button"
                                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none "
                                                        data-hs-overlay="#hs-scale-animation-modal{{ $isi }}">
                                                        Tidak
                                                    </button>
                                                    <button type="submit"
                                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                                        Ya
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach



                            {{-- modal edit --}}
                            @foreach ($data as $key => $edit)
                                <div id="default-modal{{ $key }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <form action="{{ route('vacancy.update', $edit->vacancy_id) }}" method="POST">
                                        @csrf
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                                                    <h3 class="text-xl font-semibold text-gray-900 ">
                                                        Edit
                                                    </h3>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <div class="grid grid-cols-2 gap-x-4">
                                                        <div class="">
                                                            <h1 class="text-lg font-semibold">
                                                                Tanggal Posting
                                                            </h1>
                                                            <input class="w-full rounded-lg text-lg" type="date"
                                                                name="posting_date" value="{{ $edit->posting_date }}">
                                                        </div>
                                                        <div class="">
                                                            <h1 class="text-lg font-semibold">
                                                                Tanggal Berakhir
                                                            </h1>
                                                            <input class="w-full rounded-lg text-lg" type="date"
                                                                name="closing_date" value="{{ $edit->closing_date }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex gap-x-4 items-center p-4 md:p-5 rounded-b">

                                                    <button data-modal-hide="default-modal{{ $key }}"
                                                        type="button"
                                                        class="py-2.5 px-5 text-sm font-semibold text-white focus:outline-none bg-red-600 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                                                    <button data-modal-hide="default-modal" type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach


                            <!-- Modal untuk menampilkan Job Description dan Qualification -->
                            <div id="hs-scroll-inside-body-modal{{ $no }}"
                                class="hs-overlay hidden fixed top-0 start-0 z-[80] w-full h-full overflow-x-hidden overflow-y-auto"
                                role="dialog" tabindex="-1">
                                <div
                                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 h-[calc(100%-3.5rem)] sm:mx-auto">
                                    <div
                                        class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl">
                                        <div class="flex justify-between items-center py-3 px-4 border-b">
                                            <h3 class="font-bold text-gray-800">
                                                Lihat Job Description dan Kualifikasi
                                            </h3>
                                            <button type="button"
                                                class="inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200"
                                                aria-label="Close"
                                                data-hs-overlay="#hs-scroll-inside-body-modal{{ $no }}">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M18 6 6 18"></path>
                                                    <path d="m6 6 12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="p-4 overflow-y-auto">
                                            <div class="space-y-4">
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-800">Job Description</h3>
                                                    @if (is_array($item->job_description) && count($item->job_description) > 0)
                                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                                            @foreach ($item->job_description as $desc)
                                                                <li class="text-gray-800">{{ $desc }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="text-gray-800">Tidak ada deskripsi pekerjaan.</p>
                                                    @endif
                                                </div>

                                                <div class="mt-4">
                                                    <h3 class="text-lg font-semibold text-gray-800">Qualification</h3>
                                                    @if (is_array($item->qualifications) && count($item->qualifications) > 0)
                                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                                            @foreach ($item->qualifications as $qual)
                                                                <li class="text-gray-800">{{ $qual }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="text-gray-800">Tidak ada kualifikasi.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                            <button type="button"
                                                class="py-2 px-3 text-sm font-medium rounded-lg bg-white text-gray-800 hover:bg-gray-50"
                                                data-hs-overlay="#hs-scroll-inside-body-modal{{ $no }}">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>


    </div>
@endsection
