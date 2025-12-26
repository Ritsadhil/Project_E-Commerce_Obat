<x-layout>
    <x-slot:title>Detail Pesanan</x-slot:title>

    <div class="max-w-5xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6">Detail Pengiriman</h1>

        <div class="bg-white p-6 rounded shadow mb-6">
            <p><b>Status:</b> {{ ucfirst($transaction->status) }}</p>
            <p><b>Alamat:</b> {{ $transaction->shipping_address }}</p>
            <p><b>Tanggal:</b> {{ $transaction->transaction_date }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h2 class="font-semibold mb-4">Produk</h2>

            @foreach ($transaction->details as $detail)
                <div class="flex justify-between border-b py-2">
                    <span>
                        {{ $detail->medicine->name }} ({{ $detail->quantity }}x)
                    </span>
                    <span>
                        Rp{{ number_format($detail->price * $detail->quantity,0,',','.') }}
                    </span>
                </div>
            @endforeach

            <div class="text-right font-bold mt-4">
                Total: Rp{{ number_format($transaction->total_price,0,',','.') }}
            </div>
        </div>
    </div>
</x-layout>
