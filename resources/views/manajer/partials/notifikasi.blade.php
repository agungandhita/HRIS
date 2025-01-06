{{-- <div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Notifikasi Pengajuan Masuk</h1>
        @if(auth()->user()->unreadNotifications->count() > 0)
        <form action="{{ route('notifications.readAll') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Tandai Semua Dibaca
            </button>
        </form>
        @endif
    </div>

    <div class="space-y-4">
        @forelse(auth()->user()->notifications as $notification)
        <div class="border rounded p-4 {{ $notification->read_at ? 'bg-gray-50' : 'bg-white border-blue-500' }}">
            <div class="flex justify-between">
                <div class="flex-1">
                    <p class="font-semibold">{{ $notification->data['pesan'] }}</p>
                    <div class="mt-2 text-sm">
                        <p><strong>Tanggal Pengajuan:</strong> {{ $notification->data['detail']['tanggal_pengajuan'] }}</p>
                        <p><strong>Jenis Pengajuan:</strong> {{ $notification->data['detail']['jenis_pengajuan'] }}</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    @if(!$notification->read_at)
                    <a href="{{ route('pengajuan.show', $notification->data['pengajuan_id']) }}"
                       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Lihat Detail
                    </a>
                    <button onclick="markAsRead('{{ $notification->id }}')"
                            class="text-blue-500 hover:text-blue-700">
                        Tandai Dibaca
                    </button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-8 text-gray-500">
            Tidak ada pengajuan baru
        </div>
        @endforelse
    </div>
</div> --}}
