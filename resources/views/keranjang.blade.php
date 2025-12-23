<x-layout>
    <x-slot:title>Keranjang</x-slot:title>

    <div class="bg-white font-arial">
        <div class="max-w-7xl mx-auto px-6 py-8">

            <h1 class="text-2xl font-bold mb-4">Keranjang</h1>

            {{-- PILIH SEMUA --}}
            <div class="flex items-center gap-2 mb-4">
                <input
                    type="checkbox"
                    id="checkAll"
                    class="accent-[#00B7B5] w-4 h-4"
                >
                <label for="checkAll" class="text-sm text-gray-700 cursor-pointer">
                    Pilih Semua
                </label>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- KIRI: LIST PRODUK --}}
                <div class="lg:col-span-2 space-y-4">

                    @forelse($carts as $cart)
                        <div
                            class="border border-[#00B7B5] rounded-lg p-4 flex gap-4 items-center">

                            <input
                                type="checkbox"
                                class="item-checkbox accent-[#00B7B5]">

                            {{-- GAMBAR --}}
                            <img
                                src="{{ asset('img/' . ($cart->medicine->image ?? 'DOC3.png')) }}"
                                class="w-50 h-50 object-cover rounded">

                            <div class="flex-1">
                                <p class="font-semibold">
                                    {{ $cart->medicine->name }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Rp {{ number_format($cart->medicine->price, 0, ',', '.') }}
                                </p>
                            </div>

                            {{-- QTY --}}
                            <div class="flex items-center gap-2">
                                <button
                                    class="w-9 h-9 border border-[#00B7B5] rounded
                                           text-[#00B7B5]
                                           hover:bg-[#00B7B5] hover:text-white
                                           transition">
                                    -
                                </button>

                                <span class="min-w-[20px] text-center">
                                    {{ $cart->quantity }}
                                </span>

                                <button
                                    class="w-9 h-9 border border-[#00B7B5] rounded
                                           text-[#00B7B5]
                                           hover:bg-[#00B7B5] hover:text-white
                                           transition">
                                    +
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Keranjang kosong</p>
                    @endforelse

                </div>

                {{-- KANAN: RINGKASAN --}}
                <div
                    class="border border-[#00B7B5] rounded-lg p-6 h-fit">

                    <h2 class="font-bold text-lg mb-4">
                        Ringkasan Belanja
                    </h2>

                    @php
                        $total = 0;
                        foreach ($carts as $cart) {
                            $total += $cart->medicine->price * $cart->quantity;
                        }
                    @endphp

                    <div class="flex justify-between mb-4">
                        <span>Total</span>
                        <span class="font-bold">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    <button
                        class="w-full py-3 rounded-lg
                               text-white font-nexa
                               hover:opacity-90
                               transition"
                        style="background:#018790">
                        Beli ({{ $carts->count() }})
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- SCRIPT PILIH SEMUA --}}
    <script>
        const checkAll = document.getElementById('checkAll');
        const itemCheckboxes = document.querySelectorAll('.item-checkbox');

        checkAll.addEventListener('change', function () {
            itemCheckboxes.forEach(cb => cb.checked = this.checked);
        });
    </script>
</x-layout>
