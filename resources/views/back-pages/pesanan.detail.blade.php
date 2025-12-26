@extends('components.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-gray-800">Detail Pesanan #{{ $transaction->id }}</h2>

<div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-6">
    <div class="mb-4">
        <p>
            <span class="font-bold">Nama Pemesan:</span> {{ $transaction->user->name ?? 'User Terhapus' }}
        </p>
        <p>
            <span class="font-bold">Alamat Pengiriman:</span> <br>
            <span class="text-sm block bg-gray-50 p-2 rounded mt-1 border border-gray-100">
                {{ $transaction->shipping_address }}
            </span>
        </p>
        <p>
            <span class="font-bold">Tanggal Transaksi:</span> {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}
        </p>
        <p>
            <span class="font-bold">Status:</span> {{ ucfirst($transaction->status) }}
        </p>
    </div>

    <h3 class="font-bold mb-3">Daftar Obat:</h3>
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Nama Obat</th>
                    <th class="px-4 py-2 border-b">Harga</th>
                    <th class="px-4 py-2 border-b">Jumlah</th>
                    <th class="px-4 py-2 border-b">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction->details as $index => $detail)
                <tr class="text-center">
                    <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border-b">{{ $detail->medicine->name ?? 'Obat Terhapus' }}</td>
                    <td class="px-4 py-2 border-b">Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border-b">{{ $detail->quantity }}</td>
                    <td class="px-4 py-2 border-b">
                        Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="font-bold text-lg">
                    <td colspan="4" class="text-right px-4 py-2 border-t">Total:</td>
                    <td class="px-4 py-2 border-t">
                        Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('pesanan.index') }}" class="px-4 py-2 bg-[#018790] text-white rounded-lg hover:bg-[#016b6d] transition">
            Kembali
        </a>
    </div>
</div>
@endsection
