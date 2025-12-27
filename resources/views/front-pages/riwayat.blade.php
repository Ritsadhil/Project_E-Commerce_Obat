<x-layout>
    <x-slot:title>
        Riwayat Pesanan - MedStore
    </x-slot:title>

    <!-- PAGE HEADER -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Riwayat Pesanan</h1>
        <p class="text-gray-600 text-lg">Temukan semua Pesanan Anda di sini.</p>
    </div>

    <!-- FILTER TABS -->
    <div class="bg-white rounded-xl shadow-sm mb-6 overflow-hidden">
        <div class="flex border-b">
            <button class="filter-tab active px-6 py-4 font-semibold transition border-b-2" data-status="all">
                Semua Pesanan
            </button>
            <button class="filter-tab px-6 py-4 font-semibold transition border-b-2 border-transparent" data-status="dikemas">
                Dikemas
            </button>
            <button class="filter-tab px-6 py-4 font-semibold transition border-b-2 border-transparent" data-status="diterima">
                Diterima
            </button>
            <button class="filter-tab px-6 py-4 font-semibold transition border-b-2 border-transparent" data-status="dibatalkan">
                Dibatalkan
            </button>
        </div>
    </div>

    <!-- ORDER CARDS CONTAINER -->
    <div class="space-y-6" id="orders-container">
        @forelse($transactions as $transaction)
        <div class="order-card bg-white rounded-xl shadow-sm overflow-hidden" data-status="{{ $transaction->status }}">
            <!-- Order Header -->
            <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-b">
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-bold text-gray-800">Pesanan #INV-2025-12-{{ $transaction->id }}</span>
                    </div>
                    <span class="text-gray-400">|</span>
                    <span class="text-gray-600">{{ $transaction->transaction_date ? \Carbon\Carbon::parse($transaction->transaction_date)->format('d F Y') : 'Tanggal tidak tersedia' }}</span>
                </div>
                <span class="px-4 py-1.5 
                    @if($transaction->status == 'diterima') bg-green-100 text-green-700
                    @elseif($transaction->status == 'dikemas') bg-yellow-100 text-yellow-700
                    @elseif($transaction->status == 'dibatalkan') bg-red-100 text-red-700
                    @else bg-gray-100 text-gray-700
                    @endif
                    rounded-full text-sm font-bold">
                    @if($transaction->status == 'diterima') Selesai
                    @elseif($transaction->status == 'dikemas') Dikemas
                    @elseif($transaction->status == 'dibatalkan') Dibatalkan
                    @else {{ ucfirst($transaction->status) }}
                    @endif
                </span>
            </div>

            <!-- Order Items -->
            <div class="p-6">
                @foreach($transaction->details as $detail)
                <div class="flex gap-4 mb-4 {{ !$loop->last ? 'pb-4 border-b border-gray-100' : '' }}">
                    <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="{{ asset('img/' . strtoupper(str_replace(' ', '', $detail->medicine->name)) . '.png') }}" alt="{{ $detail->medicine->name }}" class="w-full h-full object-contain p-2">
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-800 mb-1">{{ $detail->medicine->name }}</h3>
                        <p class="text-gray-600 mb-2">{{ $detail->quantity }} {{ $detail->medicine->unit }} x Rp {{ number_format($detail->price, 0, ',', '.') }}</p>
                        <p class="text-gray-700">Total : <span class="font-bold">Rp {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</span></p>
                    </div>
                </div>
                @endforeach

                @if($transaction->status == 'dikemas')
                <!-- Tracking Info -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-bold text-yellow-800 mb-1">Pesanan sedang dikemas</p>
                            <p class="text-xs text-yellow-700">Pesanan Anda sedang diproses dan akan segera dikirim.</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($transaction->status == 'dibatalkan')
                <!-- Cancellation Reason -->
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-sm font-bold text-red-800 mb-1">Pesanan dibatalkan</p>
                            <p class="text-xs text-red-700">Alasan: Stok habis</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Order Total -->
                <div class="border-t pt-4 mt-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700 font-semibold">Total Pesanan</span>
                        <span class="text-2xl font-bold {{ $transaction->status == 'dibatalkan' ? 'text-gray-400 line-through' : 'text-[#018790]' }}">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        {{-- Empty State --}}
        <div class="bg-white rounded-xl shadow-sm p-16 text-center">
            <svg class="w-32 h-32 mx-auto text-gray-300 mb-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
            </svg>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Pesanan</h3>
            <p class="text-gray-600 mb-8 text-lg">Anda belum memiliki riwayat pesanan</p>
            <a href="{{ route('home') }}" class="inline-block px-8 py-3 bg-[#018790] hover:bg-[#006a70] text-white rounded-full font-bold transition shadow-lg">
                Mulai Belanja
            </a>
        </div>
        @endforelse
    </div>

    {{-- Empty State (uncomment jika tidak ada pesanan) --}}
    {{-- 
    <div class="bg-white rounded-xl shadow-sm p-16 text-center">
        <svg class="w-32 h-32 mx-auto text-gray-300 mb-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
        </svg>
        <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Pesanan</h3>
        <p class="text-gray-600 mb-8 text-lg">Anda belum memiliki riwayat pesanan</p>
        <a href="{{ route('home') }}" class="inline-block px-8 py-3 bg-[#018790] hover:bg-[#006a70] text-white rounded-full font-bold transition shadow-lg">
            Mulai Belanja
        </a>
    </div>
    --}}

    {{-- JavaScript for Filter Tabs --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.filter-tab');
            const orderCards = document.querySelectorAll('.order-card');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    tabs.forEach(t => {
                        t.classList.remove('active', 'text-[#018790]', 'bg-teal-50', 'border-[#018790]');
                        t.classList.add('text-gray-600', 'hover:bg-gray-50');
                    });

                    // Add active class to clicked tab
                    this.classList.add('active', 'text-[#018790]', 'bg-teal-50', 'border-[#018790]');
                    this.classList.remove('text-gray-600', 'hover:bg-gray-50');

                    const status = this.getAttribute('data-status');

                    // Filter order cards
                    orderCards.forEach(card => {
                        if (status === 'all' || card.getAttribute('data-status') === status) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>

    <style>
        .filter-tab.active {
            color: #018790;
            background-color: rgba(1, 135, 144, 0.05);
            border-bottom-color: #018790;
        }
        
        .filter-tab:not(.active) {
            color: #6B7280;
            border-bottom-color: transparent;
        }
        
        .filter-tab:not(.active):hover {
            background-color: #F9FAFB;
        }
    </style>

</x-layout>