<div class="mt-24">
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-1px shadow-xl border-gray-300 rounded-xl border-[2px] lg:mt-1.5">
        <div class="w-full flex justify-between ">
            <div class="">
                <h3 class="text-2xl font-semibold text-gray-900">Daftar Penggajian</h3>
            </div>
            <div class="md:flex">
                <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">

                    <div class="flex space-x-3">
                        <a href="{{ route('penggajian.riwayat') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                            Riwayat Penggajian
                        </a>
                        <a href="{{ route('admin.penggajian.export-csv') }}"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Export Excel
                        </a>
                        <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md"
                            onclick="document.getElementById('prosesGajiModal').classList.remove('hidden')">
                            Proses Gaji Bulan Ini
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
