@extends('pegawai.layouts.main')

@section('container')
    <div class="mt-20">
        @include('pegawai.dashboard._header')
        <div class="bg-yellow-400">
            <div class="py-5">
                <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="bg-slate-100 shadow-best rounded-xl mx-4">
                    <div class="px-3">
                        <h1 class="py-3 pl-1 text-base font-semibold">
                            Input Status
                        </h1>
                        <select name="status" id="status" class="border border-gray-300 rounded-lg w-full">
                            <option value="izin">
                                Izin</option>
                            <option value="cuti">
                                cuti</option>

                        </select>
                    </div>
                    <div class="px-3">
                        <h1 class="py-3 pl-1 text-base font-semibold">
                            Masukan Keterangan
                        </h1>
                        <input type="text" name="alasan" class="border border-gray-300 rounded-lg w-full" placeholder="Alasan">
                    </div>
                    <div class="px-3">
                        <h1 class="py-3 pl-1 text-base font-semibold">
                           Tanggal Izin/Cuti
                        </h1>
                        <input type="date" name="tanggal_pengajuan" class="border border-gray-300 rounded-lg w-full" placeholder="Alasan">
                    </div>
                    <div class="px-3">
                        <h1 class="py-3 pl-1 text-base font-semibold">
                            input surat jika sakit
                        </h1>
                        <input type="file" name="surat" class="border border-gray-300 rounded-lg w-full" placeholder="Alasan">
                    </div>
                    <div class="flex justify-center py-8">
                        <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-700 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-white hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-100">submit</button>
                    </div>

                    <div class="text-center text-blue-600 pb-4">
                        <a href="{{ route('pegawai.dashboard') }}" class="">
                            Kembali ke halaman utama
                        </a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
