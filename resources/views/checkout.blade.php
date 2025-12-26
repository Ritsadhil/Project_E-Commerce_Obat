<x-layout>
    <x-slot:title>Checkout</x-slot:title>

    <div class="bg-gray-100 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- ================= LEFT SIDE ================= --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- ALAMAT PENGIRIMAN --}}
                <div class="bg-white rounded-xl p-6 shadow">
                    <h2 class="font-semibold text-lg mb-3">Alamat Pengiriman</h2>

                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="font-semibold">🏢 Rumah · Budi Santoso</p>
                            <p class="text-sm text-gray-600 mt-1">
                                Jl. Contoh Alamat No. 123, Bandung, Jawa Barat, 40123<br>
                                08123456789
                            </p>
                        </div>

                        <button class="text-[#018790] text-sm font-semibold">
                            Ganti
                        </button>
                    </div>
                </div>

                {{-- PRODUK & PENGIRIMAN --}}
                <div class="bg-white rounded-xl p-6 shadow space-y-6">

                    <h2 class="font-semibold text-lg">Produk Dipesan</h2>

                    @foreach ($carts as $cart)
                        <div class="flex gap-4 border-b pb-4">
                            <img
                                src="{{ asset('img/' . ($cart->medicine->image ?? 'DOC3.png')) }}"
                                class="w-30 h-30 object-cover rounded">

                            <div class="flex-1">
                                <p class="font-semibold">
                                    {{ $cart->medicine->name }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    {{ $cart->quantity }} x
                                    Rp{{ number_format($cart->medicine->price, 0, ',', '.') }}
                                </p>

                                <p class="mt-2 font-semibold text-right">
                                    Rp{{ number_format($cart->medicine->price * $cart->quantity, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                    {{-- OPSI PENGIRIMAN (STATIS) --}}
                    <div class="border rounded-lg p-4">
                        <p class="font-semibold">Pengiriman</p>
                        <p class="text-sm mt-1">
                            Ekonomi (2–4 hari)
                        </p>
                        <p class="text-sm text-gray-500">
                            Estimasi tiba: 29 Des - 2 Jan
                        </p>
                        <p class="font-semibold mt-2">
                            Ongkir: Rp9.500
                        </p>
                    </div>

                    {{-- CATATAN --}}
                    <div>
                        <label class="text-sm font-semibold">
                            Catatan untuk penjual
                        </label>
                        <textarea
                            class="w-full border rounded-lg mt-1 p-2 text-sm"
                            rows="2"
                            placeholder="Tulis catatan (opsional)"
                        ></textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow h-fit">

                <h2 class="font-semibold text-lg mb-4">
                    Ringkasan Belanja
                </h2>

                @php
                    $subtotal = $carts->sum(fn($c) => $c->medicine->price * $c->quantity);
                    $ongkir = 9500;
                    $total = $subtotal + $ongkir;
                @endphp

                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Ongkir</span>
                        <span>Rp{{ number_format($ongkir, 0, ',', '.') }}</span>
                    </div>

                    <hr>

                    <div class="flex justify-between font-semibold text-base">
                        <span>Total Tagihan</span>
                        <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- CHECKOUT --}}
                <form
                    action="{{ route('checkout') }}"
                    method="POST"
                    class="mt-6"
                >
                    @csrf
                    <input
                        type="hidden"
                        name="shipping_address"
                        value="Jl. Contoh Alamat No. 123"
                    >

                    <button
                        type="submit"
                        class="w-full bg-[#018790] hover:bg-[#016b6d]
                               text-white py-3 rounded-lg font-semibold"
                    >
                        Buat Pesanan
                    </button>
                </form>

                <p class="text-xs text-gray-500 mt-3 text-center">
                    Dengan melanjutkan, kamu menyetujui S&K
                </p>
            </div>
        </div>
    </div>
</x-layout>
