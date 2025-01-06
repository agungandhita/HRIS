@extends('admin.layouts.main')

@section('container')
<section>
    @include('admin.dashboard._header')
    <div class="mt-24">
        @include('admin.penggajian._head')
    </div>
        <div class="mx-auto py-6">
            <div class="bg-white rounded-lg shadow">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center border-b">
                    {{-- <div class="flex space-x-3">
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
                    </div> --}}
                </div>
                <div class="p-6">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        @if ($penggajians->isEmpty())
                            <p>Tidak ada data penggajian untuk bulan {{ date('F Y') }}. Silakan proses penggajian terlebih
                                dahulu.</p>
                        @else
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            NIP</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Pegawai</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Bulan/Tahun</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Jumlah Masuk</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Jumlah Terlambat</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Total Gaji</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Total Potongan</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Gaji Bersih</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($penggajians as $index => $penggajian)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $penggajian->pegawai->nip }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $penggajian->pegawai->nama }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $penggajian->bulan }}/{{ $penggajian->tahun }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $penggajian->jumlah_masuk }} hari
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $penggajian->jumlah_terlambat }}
                                                kali
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">Rp
                                                {{ number_format($penggajian->total_gaji, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">Rp
                                                {{ number_format($penggajian->total_potongan, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">Rp
                                                {{ number_format($penggajian->gaji_bersih, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $penggajian->status === 'sudah_di_gaji' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                    {{ str_replace('_', ' ', $penggajian->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.penggajian.download-slip', ['id' => $penggajian->penggajian_id]) }}"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm">
                                                        Download PDF
                                                    </a>

                                                    @php
                                                        $phone = preg_replace(
                                                            '/[^0-9]/',
                                                            '',
                                                            $penggajian->pegawai->no_telepon,
                                                        );

                                                        if (substr($phone, 0, 1) === '0') {
                                                            $phone = '62' . substr($phone, 1);
                                                        } elseif (substr($phone, 0, 2) !== '62') {
                                                            $phone = '62' . $phone;
                                                        }

                                                        $message = 'Yth. ' . $penggajian->pegawai->nama . "\n\n";
                                                        $message .=
                                                            'Berikut slip gaji Anda untuk periode ' .
                                                            date('F Y', strtotime($penggajian->tanggal_penggajian)) .
                                                            "\n";
                                                        $message .=
                                                            'Total Gaji: Rp ' .
                                                            number_format($penggajian->gaji_bersih, 0, ',', '.');
                                                        $message = urlencode($message);
                                                    @endphp

                                                    <a href="https://web.whatsapp.com/send?phone={{ $phone }}&text={{ $message }}"
                                                        target="_blank"
                                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm">
                                                        Kirim WhatsApp
                                                    </a>


                                                    @if ($penggajian->status === 'belum_di_gaji')
                                                        <form
                                                            action="{{ route('penggajian.konfirmasi', $penggajian->penggajian_id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" id="deleteButton"
                                                                data-modal-target="deleteModal"
                                                                data-modal-toggle="deleteModal"
                                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm"
                                                                onclick="return confirm('Konfirmasi pembayaran gaji?')">
                                                                Konfirmasi Bayar
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="px-6 py-4 text-center">Tidak ada data penggajian</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Proses Gaji -->
    <div id="prosesGajiModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <form action="{{ route('penggajian.proses') }}" method="POST">
                @csrf
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900">Proses Gaji Pegawai</h3>
                    <div class="mt-4">
                        <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
                        <select name="bulan" id="bulan"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ date('n') == $i ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                        <select name="tahun" id="tahun"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @for ($i = date('Y') - 1; $i <= date('Y') + 1; $i++)
                                <option value="{{ $i }}" {{ date('Y') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="mt-5 flex justify-end">
                    <button type="button" class="mr-3 px-4 py-2 text-gray-500 hover:text-gray-700"
                        onclick="document.getElementById('prosesGajiModal').classList.add('hidden')">
                        Tutup
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Proses Gaji
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
