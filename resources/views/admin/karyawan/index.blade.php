@extends('admin.layouts.main')

@section('container')
    <section>
        @include('admin.dashboard._header')
        <div class="mt-24">
            @include('admin.karyawan._breadcum')
        </div>
        <div class="mt-4 bg-white shadow-best4 p-2 rounded-lg">
            <div class="relative flex flex-col w-full h-full  text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    NIP
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Nama
                                </p>
                            </th>

                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Posisi
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Tanggal masuk
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    No telepon
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-200 bg-slate-100">
                                <p class="text-sm font-normal leading-none text-black">
                                    Aksi
                                </p>
                            </th>
                        </tr>
                    </thead>
                    @foreach ($data as $item)

                    <tbody>
                        <tr class="hover:bg-slate-50 border-b border-slate-200">
                            <td class="p-4 py-5">
                                <p class="block font-semibold text-sm text-slate-800">{{ $item->nip }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-500">{{ $item->nama }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-500">{{ $item->posisi }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-500">{{ $item->tanggal_masuk }}</p>
                            </td>
                            <td class="p-4 py-5">
                                <p class="text-sm text-slate-500">{{ $item->no_telepon }}</p>
                            </td>
                        </tr>


                    </tbody>
                    @endforeach

                </table>

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
                </div>
            </div>

        </div>
    </section>
@endsection
