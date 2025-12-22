<x-layout>
    <x-slot:title>{{ $medicine->name }}</x-slot:title>

    <div>
        <a href="{{ url('/') }} 
        "class=" top-10 left-6 z-50
              flex items-center justify-center
              w-12 h-12 rounded-full
              bg-white shadow-md
              text-2xl text-[#018790]
              hover:bg-gray-100">
                <i class="fa fa-arrow-left"></i>
        </a>
    </div>
       
    <div class="max-w-6xl mx-auto py-10 px-4">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- Gambar Produk --}}
            <div class="">
                <img
                    src="{{ asset('img/' . $medicine->image) }}"
                    alt="{{ $medicine->name }}"
                    class="w-full max-w-sm rounded-lg shadow-md mx-auto"
                >
            </div>

            {{-- Informasi Produk --}}
            <div class="space-y-4">
                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $medicine->name }}
                </h1>

                <p class="text-2xl font-semibold text-[#018790]">
                    Rp {{ number_format($medicine->price, 0, ',', '.') }}
                </p>

                
                {{-- Stok --}}
                <p class="text-sm">
                    Stok:
                    @if ($medicine->stock > 0)
                        <span class="text-green-600 font-semibold">
                            {{ $medicine->stock }} tersedia
                        </span>
                    @else
                        <span class="text-red-600 font-semibold">
                            Habis
                        </span>
                    @endif
                </p>

                {{-- Tombol --}}
                <div class="flex gap-4 pt-4">
                    <button
                        class="px-6 py-3 rounded-lg text-white font-semibold
                        {{ $medicine->stock > 0
                            ? 'bg-[#018790] hover:bg-[#016b6d]'
                            : 'bg-gray-400 cursor-not-allowed' }}"
                        {{ $medicine->stock <= 0 ? 'disabled' : '' }}
                    >
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            <div >
                {{-- Deskripsi --}}
                <h3 class="font-semibold mb-1">Deskripsi</h3>

                <p class="text-gray-700 mb-4">
                    {{ $medicine->description }}
                </p>

                {{-- Dosis --}}
                <h3 class="font-semibold mb-1">Dosis</h3>

                <pre class="text-gray-700  p-3  whitespace-pre-line">
                    {{ $medicine->dosis }}
                </pre>
            </div>

            <div>
                {{-- Peringatan --}}
                <h3 class="font-semibold mb-1">Peringatan</h3>

                <pre class="text-gray-700  p-3  whitespace-pre-line">
                    {{ $medicine->peringatan }}
                </pre>
            </div>
            

        </div>
    </div>
</x-layout>