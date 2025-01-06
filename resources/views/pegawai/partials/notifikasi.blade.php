{{-- <div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Status Pengajuan</h1>
    </div>

    <div class="space-y-4">
        @forelse(auth()->user()->notifications as $notification)
        <div class="border rounded p-4 {{ $notification->read_at ? 'bg-gray-50' : 'bg-white border-blue-500' }}">
            <div class="flex justify-between">
                <div class="flex-1">
                    <p class="font-semibold">{{ $notification->data['pesan'] }}</p>
                    @if($notification->data['detail']['catatan'] != '-')
                    <p class="mt-2 text-sm">
                        <strong>Catatan:</strong> {{ $notification->data['detail']['catatan'] }}
                    </p>
                    @endif
                    <p class="text-sm text-gray-500 mt-2">
                        {{ \Carbon\Carbon::parse($notification->data['tanggal'])->diffForHumans() }}
                    </p>
                </div>
                @if(!$notification->read_at)
                <button onclick="markAsRead('{{ $notification->id }}')"
                        class="text-blue-500 hover:text-blue-700">
                    Tandai Dibaca
                </button>
                @endif
            </div>
        </div>
        @empty
        <div class="text-center py-8 text-gray-500">
            Tidak ada notifikasi
        </div>
        @endforelse
    </div>
</div> --}}
