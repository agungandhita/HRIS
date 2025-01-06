@extends('manajer.layouts.main')

@section('container')
    <section>
        @include('manajer.dashboard._header')
        <div class="mt-24">
            @include('manajer.approve._head')
        </div>
        <div class="mt-4 bg-white shadow-best4 p-2 rounded-lg">

            <div class="relative flex flex-col w-full h-full  text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    No
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Nama
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Pengajuan
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Keterangan
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Surat
                                </p>
                            </th>
                            <th class=" border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    status pengajuan
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Aksi
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no => $item)
                            <tr class="hover:bg-slate-50 border-b border-slate-200">
                                <td class="p-4 py-5">
                                    <p class="block font-semibold text-base text-slate-800">{{ $no + 1 }}</p>
                                </td>
                                <td class="p-4 py-5">
                                    <p class="block font-semibold text-base text-slate-800">{{ $item->pegawai->nama }}</p>
                                </td>
                                <td class="p-4 py-5">
                                    <p class="text-base text-slate-500">{{ $item->status }}</p>
                                </td>
                                <td class="p-4 py-5">
                                    <p class="text-base text-slate-500">{{ $item->alasan }}</p>
                                </td>
                                <td>
                                    @if ($item->surat)
                                        <a href="{{ Storage::url($item->surat) }}" target="_blank">Lihat Surat</a>
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>
                                <td class="text-base">{{ ucfirst($item->status_pengajuan) }}</td>
                                <td class=" py-5">
                                    <button type="button" aria-haspopup="dialog{{ $no }}" aria-expanded="false"
                                        aria-controls="hs-small-modal{{ $no }}"
                                        data-hs-overlay="#hs-small-modal{{ $no }}" class="text-blue-600 mr-4">
                                        Approve</button>
                                    <button type="button" data-modal-target="authentication-modal{{ $no }}"
                                        data-modal-toggle="authentication-modal{{ $no }}"
                                        class="text-red-700 mr-4">
                                        Reject</button>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>

                {{-- disetujui --}}
                @foreach ($data as $key => $approv)
                    <div id="hs-small-modal{{ $key }}"
                        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                        role="dialog" tabindex="-1" aria-labelledby="hs-small-modal-label{{ $key }}">
                        <form action="{{ route('approve.pengajuan', $approv->pengajuan_id) }}" method="POST">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div
                                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto ">
                                    <div class="flex justify-between items-center py-3 px-4 border-b ">
                                        <h3 id="hs-small-modal-label" class="font-bold text-gray-800 ">
                                            Approve
                                        </h3>
                                        <button type="button"
                                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none "
                                            aria-label="Close" data-hs-overlay="#hs-small-modal{{ $key }}">
                                            <span class="sr-only">Close</span>
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-4 overflow-y-auto">
                                        <p class="mt-1 text-gray-800">
                                            Apakah anda yakin ingin menyetujui pengajuan ini?
                                        </p>
                                    </div>
                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t ">
                                        <button type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none "
                                            data-hs-overlay="#hs-small-modal">
                                            Close
                                        </button>
                                        <button type="submit"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                            Approve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                @endforeach

                @foreach ($data as $cek => $reject)
                    <div id="authentication-modal{{ $cek }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <form action="{{ route('reject.pengajuan', $item->pengajuan_id) }}" method="POST">
                            @csrf
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                        <h3 class="text-xl font-semibold text-gray-900 ">
                                            Beri Catatan
                                        </h3>
                                        <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                            data-modal-hide="authentication-modal{{ $key }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Tutup</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <form class="space-y-4" action="#">
                                            <div>
                                                <label for="email"
                                                    class="block pb-2 text-sm font-medium text-gray-900 ">Catatan</label>
                                                <input type="text" name="catatan" id="email"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 @error('catatan') is-invalid @enderror"
                                                    placeholder="catatan singkat" required />

                                                @error('catatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none mt-5 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">kirim
                                                Catatan</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                @endforeach


                {{--
                <div class="flex justify-between items-center px-4 py-3">
                    <div class="text-sm text-slate-500">
                        Showing <b>1-5</b> of 45
                    </div>
                    <div class="flex space-x-1">
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            Prev
                        </button>
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-white bg-slate-800 border border-slate-800 rounded hover:bg-slate-600 hover:border-slate-600 transition duration-200 ease">
                            1
                        </button>
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            2
                        </button>
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            3
                        </button>
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            Next
                        </button>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>
@endsection
