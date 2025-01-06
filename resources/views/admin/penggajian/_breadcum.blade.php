<div class="mt-24">
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-1px shadow-xl border-gray-300 rounded-xl border-[2px] lg:mt-1.5">
        <div class="w-full mb-1">
            <div class="mb-1">
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
                            <a href="{{ route('penggajian.riwayat') }}"
                                class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2">Riwayat</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl capitalize">Riwayat Penggajian</h1>
            </div>
            <div class="md:flex">
                <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">

                    <form method="GET" action="{{ route('penggajian.riwayat') }}">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="nama_lengkap" class="block text-lg font-medium text-gray-700">Bulan</label>
                                <select name="bulan" id="bulan"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"
                                            {{ request('bulan') == $i ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::create(null, $i)->translatedFormat('F') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div>
                                <label for="cabang" class="block text-lg font-medium text-gray-700">Tahun</label>
                                <select name="tahun" id="tahun"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                                        <option value="{{ $i }}"
                                            {{ request('tahun') == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mt-4 text-center py-4 ">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Tampilkan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="flex items-center pt-4 ml-auto space-x-2 sm:space-x-3">
                    <a href="{{ route('penggajian.index') }}"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-3 text-sm font-semibold text-center text-white bg-green-600 border border-gray-300 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">
                        Kembali Ke Penggajian
                    </a>
                </div>
            </div>
        </div>
    </div>
