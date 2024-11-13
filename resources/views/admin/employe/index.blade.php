@extends('admin.layouts.main')

@section('container')
    <section>
        @include('admin.dashboard._header')
        <div class="mt-24">
            @include('admin.employe._breadcum')
        </div>
        <div class="overflow-x-auto font-[sans-serif] mt-4">
            <table class="min-w-full bg-white">
                <thead class="whitespace-nowrap">
                    <tr>
                        <th class="p-3 text-sm font-semibold bg-gray-200 text-black">
                            No
                        </th>
                        <th class="p-3 text-sm font-semibold bg-gray-200 text-black">
                            Nama Pelamar
                        </th>
                        <th class="p-3 text-sm font-semibold bg-gray-200 text-black">
                            No Hp
                        </th>
                        <th class="p-3 text-sm font-semibold bg-gray-200 text-black">
                            Sebagai
                        </th>
                        <th class="p-3 text-sm font-semibold bg-gray-200 text-black">
                            Berkas
                        </th>
                        <th class="p-3 text-sm font-semibold bg-gray-200 text-black">
                            Status
                        </th>
                        <th class="p-3 text-sm font-semibold bg-gray-200 text-black">
                            Action
                        </th>
                        
                    </tr>
                </thead>

                <tbody class="whitespace-nowrap divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="text-gray-800 text-center p-4 text-sm">
                            1
                        </td>
                        <td class="text-gray-800 text-center p-4 text-sm">
                            Joe arefadgfadgadgadgadgdgdg
                        </td>
                        <td class="text-center p-4 text-sm">
                            <div class="mx-auto px-3 py-1 w-max text-black rounded">082231719219</div>
                        </td>
                        <td class="text-center p-4 text-sm">
                            <div class="mx-auto px-3 py-1 w-max text-black rounded">Waiter</div>
                        </td>
                        <td class="text-center p-4 flex items-center">
                            <div class="w-full pt-2">
                                <a href="" class="text-center text-blue-700 capitalize">
                                    lihat Berkas    
                                </a>
                            </div>
                        </td>
                        <td class="text-center p-4 text-sm">
                            <div class="mx-auto px-3 py-1 bg-green-500 w-max text-white rounded">Done</div>
                        </td>
                        <td class="p-4">
                            <div class="flex justify-center gap-x-4 items-center">
                                <a href="/manajer/detail" class="mt-1">
                                    <button title="lihat data">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  class="w-6 fill-yellow-300 hover:fill-yellow-400"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>
                                    </button>
                                </a>

                                <a href="" class="mt-1">
                                    <button title="edit data">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 fill-blue-500 hover:fill-blue-700" viewBox="0 0 348.882 348.882">
                                            <path
                                                d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                                data-original="#000000" />
                                            <path
                                                d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                                data-original="#000000" />
                                        </svg>
                                    </button>
                                </a>


                                <form action="/delete/" method="POST">
                                    @csrf
                                    <button class="mr-4 mt-1" title="Delete" type="button" id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000" />
                                            <path
                                                d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000" />
                                        </svg>
                                    </button>

                                    <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative p-4 text-center bg-white rounded-lg shadow  sm:p-5">
                                                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="deleteModal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <svg class="text-black w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                <p class="mb-4 text-black ">yakin ingin menghapus akun ini?</p>
                                                <div class="flex justify-center items-center space-x-4">
                                                    <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-black bg-white rounded-lg border border-gray-600 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 ">
                                                        tidak, batalkan
                                                    </button>
                                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                                                        iya Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                        
                    </tr>
                </tbody>
            </table>

            {{-- <div class="md:flex m-4">
                <p class="text-sm text-gray-500 flex-1">Showind 1 to 5 of 100 entries</p>
                <div class="flex items-center max-md:mt-4">
                    <p class="text-sm text-gray-500">Display</p>

                    <select class="text-sm text-gray-500 border border-gray-400 rounded px-1 py-2 mx-4 outline-none">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                    </select>

                    <div class="border flex rounded divide-x-2 border-gray-400 divide-gray-400 overflow-hidden">
                        <button type="button" class="px-4 py-2 hover:bg-gray-100 text-sm">Previous</button>
                        <button type="button" class="px-4 py-2 hover:bg-gray-100 text-sm">Next</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
