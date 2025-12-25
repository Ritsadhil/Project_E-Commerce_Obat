@extends('components.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Pesanan</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        @foreach($transactions as $pesanan)
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition flex flex-col justify-between relative overflow-hidden">
            
            @php
                $statusColor = match($pesanan->status) {
                    'dikemas' => 'bg-yellow-500',
                    'dikirim' => 'bg-blue-500',
                    'diterima' => 'bg-green-500',
                    'dibatalkan' => 'bg-red-500',
                    default => 'bg-gray-500',
                };
            @endphp
            <div class="absolute top-0 right-0 px-3 py-1 text-xs font-bold text-white {{ $statusColor }}">
                {{ strtoupper($pesanan->status) }}
            </div>

            <div class="space-y-3 text-gray-700 mt-2">
                <p>
                    <span class="font-bold text-gray-900">ID Pesanan:</span> 
                    #{{ $pesanan->id }}
                </p>
                <p>
                    <span class="font-bold text-gray-900">Nama Pemesan:</span> <br>
                    {{ $pesanan->user->name ?? 'User Terhapus' }}
                </p>
                <p>
                    <span class="font-bold text-gray-900">Alamat Pengiriman:</span> <br>
                    <span class="text-sm block bg-gray-50 p-2 rounded mt-1 border border-gray-100">
                        {{ $pesanan->shipping_address }}
                    </span>
                </p>
                <p>
                    <span class="font-bold text-gray-900">Total Harga:</span> 
                    <span class="text-[#00897b] font-bold text-lg">
                        Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}
                    </span>
                </p>
                <p class="text-xs text-gray-500">
                    Tgl: {{ \Carbon\Carbon::parse($pesanan->transaction_date)->format('d M Y') }}
                </p>
            </div>
            
            <button class="w-full mt-6 bg-[#00897b] hover:bg-[#00796b] text-white font-bold py-2 rounded-lg transition">
                Update Status
            </button>
        </div>
        @endforeach
    
    </div>
@endsection