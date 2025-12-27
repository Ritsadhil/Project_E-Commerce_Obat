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
                <div class="mt-4 border-t pt-2 border-dashed border-gray-300">
                  <span class="font-bold text-gray-900 text-sm">Produk yang dibeli:</span>
                  <ul class="mt-1 space-y-1">
                  @foreach($pesanan->details as $detail)
                 <li class="text-sm text-gray-600 flex justify-between items-center">
                   <span>
                    {{ $detail->medicine->name ?? 'Obat Dihapus' }} 
                    <span class="text-xs text-gray-400">x{{ $detail->quantity }}</span>
                    </span>
                
                     <span class="text-xs font-semibold text-gray-500">
                    Rp{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}
                      </span>
                  </li>
                  @endforeach
                  </ul>
                </div>
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
            
            <form action="{{ route('pesanan.updateStatus', $pesanan->id) }}" method="POST" class="mt-4 pt-4 border-t border-gray-100">
    @csrf
    @method('PATCH')
    
    <div class="flex items-center gap-2">
        <select name="status" class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#00897b] focus:border-[#00897b] block w-full p-2.5">
            <option value="dikemas" {{ $pesanan->status == 'dikemas' ? 'selected' : '' }}>Dikemas</option>
            <option value="dikirim" {{ $pesanan->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
            <option value="diterima" {{ $pesanan->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="dibatalkan" {{ $pesanan->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
        </select>

        <button type="submit" class="bg-[#00897b] hover:bg-[#00796b] text-white p-2.5 rounded-lg transition shadow-md" title="Simpan Perubahan">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
        </button>
    </div>
</form>
        </div>
        @endforeach
    
    </div>
@endsection