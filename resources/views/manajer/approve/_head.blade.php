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
                        <a href="{{ route('list.pengajuan') }}" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2">Pengajuan</a>
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
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl capitalize">Pengajuan</h1>
        </div>
        <div class="md:flex">
            <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">

                <form action="{{ route('lamaran.index') }}" method="GET" class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama karyawan</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                   value="{{ request('nama_lengkap') }}"
                                   placeholder="Cari nama karyawan">
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Izin/Cuti</label>
                            <select name="status" id="status"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                <option value="">Semua Status</option>
                                <option value="shortlisted" {{ request('status') == 'rejected' ? 'selected' : '' }}>Shorlisted</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                <option value="interview" {{ request('status') == 'interview' ? 'selected' : '' }}>Interview</option>
                                <option value="on-boarding" {{ request('status') == 'on-boarding' ? 'selected' : '' }}>On Boarding</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4 flex space-x-2">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Cari
                        </button>
                        <a href="{{ route('lamaran.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                <a href="#"
                    class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-semibold text-center text-white bg-green-600 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto ">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Export
                </a>
            </div>
        </div>
    </div>
</div>
