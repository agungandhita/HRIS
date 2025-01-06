<!DOCTYPE html>
<html>

<head>
    <title>Slip Gaji Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        .header {
            text-align: right;
            margin-bottom: 20px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .footer {
            text-align: right;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div>SLIP GAJI PEGAWAI</div>
        <div>Periode: {{ date('F Y', strtotime($penggajian->tanggal_penggajian)) }}</div>
    </div>

    <div class="content">
        <table>
            <tr>
                <td width="150">NIP</td>
                <td>: {{ $penggajian->pegawai->nip }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: {{ $penggajian->pegawai->nama }}</td>
            </tr>
            <tr>
                <td>Posisi</td>
                <td>: {{ $penggajian->pegawai->posisi }}</td>
            </tr>
            <tr>
                <td>Jumlah Masuk</td>
                <td>: {{ $penggajian->jumlah_masuk }} hari</td>
            </tr>
            <tr>
                <td>Jumlah Terlambat</td>
                <td>: {{ $penggajian->jumlah_terlambat }} kali</td>
            </tr>
        </table>
    </div>

    <div>RINCIAN GAJI</div>
    <table class="table">
        <tr>
            <td>Gaji Pokok ({{ $penggajian->jumlah_masuk }} hari x
                {{ number_format($penggajian->pegawai->gaji_pokok, 0, ',', '.') }})</td>
            <td>Rp {{ number_format($penggajian->total_gaji, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Potongan Keterlambatan ({{ $penggajian->jumlah_terlambat }}x Rp 5.000)</td>
            <td>Rp {{ number_format($penggajian->total_potongan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>TOTAL GAJI BERSIH</strong></td>
            <td><strong>Rp {{ number_format($penggajian->gaji_bersih, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div>
        <p>Ditransfer ke:</p>
        <table>
            <tr>
                <td width="150">Bank</td>
                <td>: {{ $penggajian->pegawai->nama_bank }}</td>
            </tr>
            <tr>
                <td>No. Rekening</td>
                <td>: {{ $penggajian->pegawai->no_rekening }}</td>
            </tr>
            <tr>
                <td>Atas Nama</td>
                <td>: {{ $penggajian->pegawai->atas_nama }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Mengetahui,</p>
        <br><br><br>
        <p>( ........................ )</p>
        <p><strong>Direktur Utama</strong></p>
        <p>M Satria Pinandhita Amanullah</p>
    </div>
</body>

</html>
