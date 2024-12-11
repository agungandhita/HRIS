@extends('manajer.layouts.main')

@section('container')
    <section>
        @include('manajer.dashboard._header')
        <div class="mt-24">
            @include('manajer.stock._head')
        </div>

        <div class="mt-4">
            <div class="overflow-x-auto font-[sans-serif]">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100 whitespace-nowrap">
                        <tr>
                            <th class="pl-4 w-8">
                                No
                            </th>
                            <th class="p-4 text-left text-sm font-semibold text-black">
                                Produk
                            </th>
                            <th class="p-4 text-left text-sm font-semibold text-black">
                                Tanggal Masuk
                            </th>
                            <th class="p-4 text-left text-sm font-semibold text-black">
                                Jumlah masuk
                            </th>
                            <th class="p-4 text-left text-sm font-semibold text-black">
                                Jumlah Terpakai
                            </th>
                            <th class="p-4 text-left text-sm font-semibold text-black">
                                sisa stock
                            </th>
                            <th class="p-4 text-left text-sm font-semibold text-black">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="whitespace-nowrap divide-y divide-gray-200">
                        <tr>
                            <td class="pl-4 w-8">
                                1
                            </td>
                            <td class="p-4 text-sm">
                                <p class="text-sm text-black">Light Gray T-Shirt</p>
                            </td>
                            <td class="p-4 text-sm">
                                $25.00
                            </td>
                            <td class="p-4 text-sm">
                                90
                            </td>
                            <td class="p-4 text-sm">
                                200
                            </td>
                            <td class="p-4 text-sm">
                                <svg class="w-4 h-4 inline mr-1.5" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"
                                        fill="#facc15" />
                                </svg>
                                <svg class="w-4 h-4 inline mr-1.5" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"
                                        fill="#facc15" />
                                </svg>
                                <svg class="w-4 h-4 inline mr-1.5" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"
                                        fill="#facc15" />
                                </svg>
                                <svg class="w-4 h-4 inline mr-1.5" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"
                                        fill="#CED5D8" />
                                </svg>
                                <svg class="w-4 h-4 inline" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"
                                        fill="#CED5D8" />
                                </svg>
                            </td>
                            <td class="p-4 text-sm">
                                <button title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-gray-500"
                                        viewBox="0 0 32 32">
                                        <path
                                            d="M13 16c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3zm0 10c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3zm0-20c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z"
                                            data-original="#000000" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <div class="md:flex m-4">
                    <p class="text-sm text-gray-500 flex-1">Showind 1 to 5 of 100 entries</p>
                    <div class="flex items-center max-md:mt-4">
                        <p class="text-sm text-gray-500">Display</p>

                        <select class="text-sm text-gray-500 border border-gray-400 rounded h-8 px-1 mx-4 outline-none">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                        </select>

                        <ul class="flex space-x-1 ml-4">
                            <li class="flex items-center justify-center cursor-pointer bg-gray-200 w-8 h-8 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-500"
                                    viewBox="0 0 55.753 55.753">
                                    <path
                                        d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                                        data-original="#000000" />
                                </svg>
                            </li>
                            <li class="flex items-center justify-center cursor-pointer text-sm w-8 h-8 rounded">
                                1
                            </li>
                            <li
                                class="flex items-center justify-center cursor-pointer text-sm bg-[#007bff] text-white w-8 h-8 rounded">
                                2
                            </li>
                            <li class="flex items-center justify-center cursor-pointer text-sm w-8 h-8 rounded">
                                3
                            </li>
                            <li class="flex items-center justify-center cursor-pointer text-sm w-8 h-8 rounded">
                                4
                            </li>
                            <li class="flex items-center justify-center cursor-pointer bg-gray-200 w-8 h-8 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-500 rotate-180"
                                    viewBox="0 0 55.753 55.753">
                                    <path
                                        d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                                        data-original="#000000" />
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
