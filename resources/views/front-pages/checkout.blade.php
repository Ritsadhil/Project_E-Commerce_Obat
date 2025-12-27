<x-layout>
    <x-slot:title>Checkout</x-slot:title>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        
        <div class="bg-gray-100 min-h-screen py-10">
            <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ================= LEFT SIDE ================= --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- INPUT ALAMAT PENGIRIMAN --}}
                    <div class="bg-white rounded-xl p-6 shadow">
                        <h2 class="font-semibold text-lg mb-3 text-gray-800">Alamat Pengiriman</h2>
                        
                        <div class="space-y-3">
                            <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                            <textarea 
                                name="shipping_address" 
                                required
                                rows="3"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-[#018790] focus:border-[#018790] "
                                placeholder="Jalan, Nomor Rumah, RT/RW, Kecamatan, Kota..."></textarea>
                            <p class="text-xs text-gray-500">*Wajib diisi untuk pengiriman.</p>
                        </div>
                    </div>

                    {{-- LIST PRODUK DIPESAN --}}
                    <div class="bg-white rounded-xl p-6 shadow space-y-6">
                        <h2 class="font-semibold text-lg text-gray-800">Produk Dipesan</h2>

                        <div class="space-y-6">
                            @foreach ($carts as $cart)
                                <div class="flex gap-4 border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                                    {{-- Gambar Produk --}}
                                    <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('img/' . ($cart->medicine->image ?? 'DOC3.png')) }}"
                                            class="w-full h-full object-cover">
                                    </div>

                                    {{-- Detail Nama & Qty --}}
                                    <div class="flex-1 flex flex-col justify-center">
                                        <p class="font-bold text-gray-800 text-base">
                                            {{ $cart->medicine->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $cart->quantity }} item x Rp {{ number_format($cart->medicine->price, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    {{-- Subtotal Per Item --}}
                                    <div class="font-bold text-gray-700 flex items-center">
                                        Rp {{ number_format($cart->medicine->price * $cart->quantity, 0, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- ================= RIGHT SIDE ================= --}}
                <div class="bg-white rounded-xl p-6 shadow h-fit sticky top-6">
                    <h2 class="font-semibold text-lg mb-6 text-gray-800">Ringkasan Pembayaran</h2>

                    @php
                        $total = $carts->sum(fn($c) => $c->medicine->price * $c->quantity);
                    @endphp

                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-4 border-t border-b border-dashed border-gray-200">
                            <span class="font-bold text-lg text-gray-600">Total Tagihan</span>
                            <span class="font-extrabold text-2xl text-[#018790]">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    {{-- TOMBOL PROSES --}}
                    <button type="submit"
                        class="w-full mt-6 bg-[#018790] hover:bg-[#016b6d] text-white py-3.5 rounded-xl font-bold text-lg shadow-lg shadow-[#018790]/30 transition transform hover:-translate-y-1 active:scale-95">
                        Buat Pesanan
                    </button>

                    <p class="text-xs text-gray-400 mt-4 text-center leading-relaxed">
                        Dengan mengklik tombol di atas, pesanan akan diproses dan masuk ke riwayat pesanan Anda.
                    </p>
                </div>

            </div>
        </div>
    </form>
</x-layout>