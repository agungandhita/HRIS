<style>
    .payroll-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 100%;
        overflow-x: auto;
    }

    .payroll-table th, .payroll-table td {
        padding: 12px;
        border: 1px solid #0000;
        text-align: center;
        white-space: nowrap;
    }

    .payroll-table th {
        background-color: #f2f2f2;
        color: white;
        font-weight: bold;
    }

    .payroll-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .payroll-table tbody tr:hover {
        background-color: #f5f5f5;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
</style>

<table class="payroll-table">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Bulan/Tahun</th>
            <th class="text-center">Jumlah Masuk</th>
            <th class="text-center">Jumlah Terlambat</th>
            <th class="text-right">Total Gaji</th>
            <th class="text-right">Total Potongan</th>
            <th class="text-right">Gaji Bersih</th>
            <th class="text-center">Bank</th>
            <th class="text-center">No Rekening</th>
            <th class="text-center">Atas Nama</th>
            <th class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penggajians as $no => $penggajian)
            <tr>
                <td class="text-center">{{ $no + 1 }}</td>
                <td>{{ $penggajian->pegawai->nip }}</td>
                <td>{{ $penggajian->pegawai->nama }}</td>
                <td class="text-center">{{ $penggajian->bulan }}/{{ $penggajian->tahun }}</td>
                <td class="text-center">{{ $penggajian->jumlah_masuk }} hari</td>
                <td class="text-center">{{ $penggajian->jumlah_terlambat }} kali</td>
                <td class="text-right">Rp {{ number_format($penggajian->total_gaji, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($penggajian->total_potongan, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($penggajian->gaji_bersih, 0, ',', '.') }}</td>
                <td class="text-center">{{ $penggajian->pegawai->nama_bank }}</td>
                <td class="text-center">{{ implode('.', str_split($penggajian->pegawai->no_rekening, 4)) }}</td>
                <td class="text-center">{{ $penggajian->pegawai->atas_nama }}</td>
                <td class="text-center">{{ ucwords(str_replace('_', ' ', $penggajian->status)) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
