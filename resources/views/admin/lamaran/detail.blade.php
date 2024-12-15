@extends('admin.layouts.main')

@section('container')
    <section>
        @include('admin.dashboard._header')
        <div class="mt-24">
            @include('admin.lamaran._detail')
        </div>
        <div class="overflow-x-auto font-[sans-serif] mt-11">
            <div class="bg-gray-100">
                <div class="container mx-auto py-4">
                    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6">
                        <div class="col-span-4 sm:col-span-3">
                            <div class="bg-white shadow rounded-lg p-6">
                                <div class="flex flex-col items-center">
                                    <img src="{{ asset('storage/' . $data->lamaran->foto) }}"
                                        class="w-32 h-36 bg-gray-300 rounded-full mb-4 shrink-0 object-cover">
                                    </img>
                                    <h1 class="text-xl font-bold text-center">{{ $data->lamaran->nama_lengkap }}</h1>
                                    <p class="text-gray-700"></p>
                                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                        <a href="https://wa.me/{{ $data->no_telepon }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Contact</a>
                                    </div>
                                </div>
                                <hr class="my-6 border-t border-gray-300">
                                <div class="flex flex-col">
                                    <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Bio</span>
                                    <ul class="text-justify">
                                        <li class="mb-2">Institusi : {{ $data->lamaran->nama_institusi }} </li>
                                        <li class="mb-2">Jenjang : {{ $data->lamaran->jenjang_pendidikan }}</li>
                                        <li class="mb-2">Jurusan : {{ $data->lamaran->jurusan }}</li>
                                        <li class="mb-2">Nilai : {{ $data->lamaran->nilai }}</li>
                                        {{-- <li class="mb-2">Tai</li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-4 sm:col-span-9">
                            <div class="bg-white shadow rounded-lg p-6 mb-2">
                                <h2 class="text-base md:text-xl font-bold mb-4">Alamat Pelamar</h2>
                                <ul class="text-justify text-sm md:text-lg">
                                    <li>Kabupaten   : {{ $data->lamaran->kabupaten }}</li>
                                    <li>kecamatan   : {{ $data->lamaran->kecamatan }}</li>
                                    <li>alamat lengkap  : {{ $data->lamaran->alamat_lengkap }}</li>
                                </ul>
                            </div>

                            <div class="bg-white shadow rounded-lg p-6">
                                <h2 class="text-base md:text-xl font-bold mb-4">Pengalaman Kerja</h2>

                                <div class="flex flex-col gap-x-4">
                                    <h1 class="text-base md:text-lg font-bold">
                                        {{ $data->lamaran->nama_perusahaan }}
                                    </h1>
                                    <h1 class="text-sm md:text-lg font-semibold text-slate-500">
                                        {{ \Carbon\Carbon::parse($data->lamaran->start_date)->format('F Y') }} -
                                        {{ \Carbon\Carbon::parse($data->lamaran->end_date)->format('F Y') }}
                                    </h1>
                                </div>
                                <div class="mt-2">
                                    <p class="text-sm md:text-base text-justify">
                                        {{ $data->lamaran->deskripsi_pekerjaan }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2 bg-white shadow rounded-lg p-6">
                                <h1 class="text-lg md:text-lg font-bold mb-2">
                                    cv
                                </h1>
                                <iframe src="{{ route('cv.view', ['id' => $data->lamar_id]) }}" width="100%"
                                    height="700px"></iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
