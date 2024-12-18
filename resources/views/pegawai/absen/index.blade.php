@extends('pegawai.layouts.main')

@section('container')
    <div class="mt-20">

        @include('pegawai.dashboard._header')
        <div class="bg-yellow-500">
            <div class="flex justify-between">
                <div class="px-4 flex gap-x-4 pt-8">
                    <img src="{{ asset('img/logo.png') }}" class="w-12 opacity-85 rounded-full object-cover"
                        alt="Banner Image">
                    <div class="">
                        <h1 class="text-white text-base font-bold ">{{ Auth::guard('pegawai')->user()->nama }}</h1>
                        <h1 class="text-white text-sm font-serif ">{{ Auth::guard('pegawai')->user()->posisi }}</h1>
                    </div>
                </div>
                <div class="px-4 pt-8 text-end">
                    <h1 id="waktu" class="text-white text-base font-bold "></h1>
                    <h1 id="tanggal" class="text-white text-sm font-serif "></h1>
                </div>

            </div>
            <div class="flex mt-8 mb-8 justify-between px-11">
                <form action="{{ route('absen.masuk') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 px-3 py-2 md:px-6 md:py-3 rounded-xl text-white text-sm md:text-xl tracking-wider font-bold outline-none bg-green-600 hover:bg-green-700 border-2 border-green-600 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                            <path
                                d="M7 3V1H9V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V9H20V5H17V7H15V5H9V7H7V5H4V19H10V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7ZM17 12C14.7909 12 13 13.7909 13 16C13 18.2091 14.7909 20 17 20C19.2091 20 21 18.2091 21 16C21 13.7909 19.2091 12 17 12ZM11 16C11 12.6863 13.6863 10 17 10C20.3137 10 23 12.6863 23 16C23 19.3137 20.3137 22 17 22C13.6863 22 11 19.3137 11 16ZM16 13V16.4142L18.2929 18.7071L19.7071 17.2929L18 15.5858V13H16Z">
                            </path>
                        </svg>
                        Absen Masuk
                    </button>
                </form>

                <form action="{{ route('absen.keluar') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 px-3 py-2 md:px-6 md:py-3 rounded-xl text-white text-sm md:text-xl tracking-wider font-bold outline-none  bg-orange-600 hover:bg-orange-700 border-2 border-orange-600 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">
                            <path
                                d="M17.6177 5.9681L19.0711 4.51472L20.4853 5.92893L19.0319 7.38231C20.2635 8.92199 21 10.875 21 13C21 17.9706 16.9706 22 12 22C7.02944 22 3 17.9706 3 13C3 8.02944 7.02944 4 12 4C14.125 4 16.078 4.73647 17.6177 5.9681ZM12 20C15.866 20 19 16.866 19 13C19 9.13401 15.866 6 12 6C8.13401 6 5 9.13401 5 13C5 16.866 8.13401 20 12 20ZM11 8H13V14H11V8ZM8 1H16V3H8V1Z">
                            </path>
                        </svg>Absen
                        Pulang</button>
                </form>



            </div>
            <div class=" bg-white relative z-20  w-full rounded-t-2xl min-h-full">
                <div class="mx-auto pt-7 lg:mb-14 px-4">
                    <h2 class="text-2xl font-extrabold md:text-5xl md:leading-tight italic">Daftar Absensi</h2>
                    <div class="mt-1 w-64 h-3 bg-gradient-to-r from-red-900"></div>

                    <ul class="max-w-md py-5 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($absensi as $item)
                            
                        <li class="pb-3 sm:pb-4">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate capitalize mb-3 ">
                                        {{ \Carbon\Carbon::parse($item->tanggal_absensi)->translatedFormat('d F Y') }}
                                    </p>
                                    <p class="text-sm text-gray-700 truncate font-semibold ">
                                        {{ $item->jam_masuk }} - {{ $item->jam_keluar }}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-green-400 ">
                                    {{ $item->keterangan }}
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                </div>
            </div>
        </div>

    </div>
@endsection

<script>
    function updateWaktu() {
        const sekarang = new Date();

        const offsetWIB = 7;
        const waktuWIB = new Date(sekarang.getTime() + (offsetWIB * 60 * 60 * 1000));

        const jam = waktuWIB.getUTCHours().toString().padStart(2, '0');
        const menit = waktuWIB.getUTCMinutes().toString().padStart(2, '0');
        const detik = waktuWIB.getUTCSeconds().toString().padStart(2, '0');

        const hariArray = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const bulanArray = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ];

        const hari = hariArray[waktuWIB.getUTCDay()];
        const tanggal = waktuWIB.getUTCDate();
        const bulan = bulanArray[waktuWIB.getUTCMonth()];
        const tahun = waktuWIB.getUTCFullYear();

        document.getElementById("waktu").innerText = `${jam}:${menit}:${detik} WIB`;
        document.getElementById("tanggal").innerText = `${hari}, ${tanggal} ${bulan} ${tahun}`;
    }

    setInterval(updateWaktu, 1000);

    updateWaktu();
</script>
