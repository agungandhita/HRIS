@extends('admin.layouts.main')

@section('container')
    <section>
        @include('admin.dashboard._header')
        <div class="mt-24">
            @include('admin.lamaran._breadcum')
        </div>
        <table class="min-w-full bg-white mt-7">
            <thead class="whitespace-nowrap">
                <tr>
                    <th class="p-3 text-sm font-semibold bg-gray-200 text-black">No</th>
                    <th class="p-3 text-sm font-semibold bg-gray-200 text-black">Nama Pelamar</th>
                    <th class="p-3 text-sm font-semibold bg-gray-200 text-black">No Hp</th>
                    <th class="p-3 text-sm font-semibold bg-gray-200 text-black">Sebagai</th>
                    <th class="p-3 text-sm font-semibold bg-gray-200 text-black">Cabang</th>
                    <th class="p-3 text-sm font-semibold bg-gray-200 text-black">Berkas</th>
                    <th class="p-3 text-sm font-semibold bg-gray-200 text-black">Status</th>
                    <th class="p-3 text-sm font-semibold bg-gray-200 text-black">Action</th>
                </tr>
            </thead>

            <tbody class="whitespace-nowrap divide-y divide-gray-200">
                @forelse ($data as $cek => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="text-gray-800 text-center p-4 text-sm">{{ $cek + 1 }}</td>
                        <td class="text-gray-800 text-center p-4 text-sm">
                            {{ $item->lamaran->nama_lengkap }}
                        </td>
                        <td class="text-center p-4 text-sm">
                            <div class="mx-auto px-3 py-1 w-max text-black rounded">
                                {{ $item->lamaran->no_telepon }}
                            </div>
                        </td>
                        <td class="text-center p-4 text-sm">
                            <div class="mx-auto px-3 py-1 w-max text-black rounded">
                                {{ $item->vacancy->title }}
                            </div>
                        </td>
                        <td class="text-center p-4 text-sm">
                            <div class="mx-auto px-3 py-1 w-max text-black rounded">
                                {{ $item->vacancy->cabang }}
                            </div>
                        </td>
                        <td class="text-center p-4 flex items-center">
                            <div class="w-full pt-2">
                                <a href="{{ route('lamaran.detail', $item->application_id) }}"
                                    class="text-center text-blue-700 capitalize">Lihat Berkas</a>
                            </div>
                        </td>
                        <td class="text-center p-4 text-sm">
                            <div
                                class="mx-auto px-3 py-1 w-max text-white rounded
                                @if ($item->status === 'rejected') bg-red-500
                                @elseif ($item->status === 'interview') bg-yellow-500
                                @elseif ($item->status === 'on boarding') bg-green-500
                                @else bg-gray-500 @endif">
                                {{ $item->status }}
                            </div>
                        </td>

                        <td class="p-4">
                            <div class="flex justify-center gap-x-4 items-center">
                                <!-- Button Edit -->
                                <button title="Edit Data" data-modal-target="default-modal{{ $item->application_id }}"
                                    data-modal-toggle="default-modal{{ $item->application_id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z">
                                        </path>
                                    </svg>
                                </button>

                                <!-- Button Delete -->
                                <button title="Delete" data-modal-target="deleteModal{{ $item->application_id }}"
                                    data-modal-toggle="deleteModal{{ $item->application_id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z">
                                        </path>
                                        <path
                                            d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-4 text-gray-500">
                            Tidak ada data lamaran ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>



        {{-- modal edit --}}
        @foreach ($data as $item)
            <div class="overflow-x-auto font-[sans-serif] mt-4">
                <div id="default-modal{{ $item->application_id }}" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
                    <form action="{{ route('lamaran.update', $item->application_id) }}" method="POST">
                        @csrf
                        <div class="relative px-4 w-96 max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <div class="p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-xl font-semibold text-gray-900">Edit</h3>
                                </div>
                                <div class="mb-2 px-8">
                                    <label for="status" class="block font-medium mb-2">Status</label>
                                    <select name="status" id="status"
                                        class="border border-gray-300 rounded px-4 py-2 w-full">
                                        <option value="shortlisted" {{ $item->status == 'shortlisted' ? 'selected' : '' }}>
                                            Shortlisted</option>
                                        <option value="interview" {{ $item->status == 'interview' ? 'selected' : '' }}>
                                            Interview</option>
                                        <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                        <option value="on boarding" {{ $item->status == 'on boarding' ? 'selected' : '' }}>
                                            On-boarding</option>
                                    </select>
                                </div>
                                <div class="flex gap-x-4 items-center p-4 md:p-5 rounded-b">
                                    <button data-modal-hide="default-modal{{ $item->application_id }}" type="button"
                                        class="py-2.5 px-5 text-sm font-semibold text-white bg-red-600 rounded-lg">Batal</button>
                                    <button type="submit"
                                        class="py-2.5 px-5 text-sm font-semibold text-white bg-blue-700 rounded-lg">Edit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        @endforeach

        {{-- modal delete --}}
        <div id="deleteModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <form action="" method="POST">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                        <button type="button"
                            class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="deleteModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293..."></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <p class="mb-4 text-black">Yakin ingin menghapus akun ini?</p>
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-hide="deleteModal" type="button"
                                class="py-2.5 px-5 text-sm font-semibold text-white bg-red-600 rounded-lg">Batal</button>
                            <button type="submit"
                                class="py-2.5 px-5 text-sm font-semibold text-white bg-red-600 rounded-lg">Hapus</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        </div>
    </section>
@endsection
