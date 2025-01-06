@extends('admin.layouts.main')

@section('container')
<section>
    @include('admin.dashboard._header')
    <div class="mt-24">
        @include('admin.penggajian._breadcum')
    </div>
    <div class="mx-auto px-4 sm:px-1 py-8">
        <div class="bg-white rounded-lg shadow">

            <div class="p-6">
                @foreach($penggajians as $period => $gajis)
                    @php
                        [$tahun, $bulan] = explode('-', $period);
                        $namaBulan = date('F', mktime(0, 0, 0, $bulan, 1));
                    @endphp

                    <div class="mb-8">
                        <h4 class="text-lg font-medium mb-4">Periode {{ $namaBulan }} {{ $tahun }}</h4>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIP</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah Masuk</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah Terlambat</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Gaji</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Potongan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gaji Bersih</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($gajis as $index => $gaji)
                                        <tr>
                                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4">{{ $gaji->pegawai->nip }}</td>
                                            <td class="px-6 py-4">{{ $gaji->pegawai->nama }}</td>
                                            <td class="px-6 py-4">{{ $gaji->jumlah_masuk }} hari</td>
                                            <td class="px-6 py-4">{{ $gaji->jumlah_terlambat }} kali</td>
                                            <td class="px-6 py-4">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4">Rp {{ number_format($gaji->total_potongan, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4">Rp {{ number_format($gaji->gaji_bersih, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                    {{ $gaji->status === 'sudah_di_gaji' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                    {{ str_replace('_', ' ', $gaji->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('admin.penggajian.download-slip', ['id' => $gaji->penggajian_id]) }}"
                                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm">
                                                    Download PDF
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>
@endsection
