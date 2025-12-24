<x-layout>
    <x-slot:title>
        Home - MedStore
    </x-slot:title>

    <div class="w-full bg-gradient-to-r from-white to-[#018790] px-10 py-12 rounded-3xl flex justify-between items-center mx-auto shadow-md mb-10 relative overflow-hidden">
        <div class="w-1/2 z-10">
            <h1 class="text-5xl m-0 leading-tight font-bold text-gray-800 font-sans">
                Your trusted<br>
                <span class="text-[#005461]">online pharmacy.</span>
            </h1>
            <p class="my-5 text-lg text-gray-600 font-sans">
                Temukan obat dan kebutuhan kesehatan lengkap dengan harga terbaik dan terjamin asli.
            </p>
            <a href="#" class="bg-[#005461] hover:bg-[#00424d] text-white px-8 py-3 rounded-full no-underline font-bold transition shadow-lg inline-block">
                Belanja Sekarang
            </a>
        </div>

        <div class="w-1/2 flex justify-end z-10">
            <img src="{{ asset('img/DOC3.png') }}" alt="Dokter MedStore" class="w-80 object-contain drop-shadow-xl">
        </div>

        <div class="absolute right-0 top-0 h-full w-1/2 bg-[#018790]/10 rounded-l-full"></div>
    </div>
        

    <div>
        <h2 class="text-2xl font-bold text-[#005461] mb-6 border-b-2 border-[#005461] inline-block pb-1">
            Produk
        </h2>

        <div id="medicine-container">
        @fragment('list-obat')
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($medicines as $medicine)
                <div class="bg-white rounded-xl p-5 text-center shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100 flex flex-col justify-between">
                    <div class="h-40 flex items-center justify-center mb-4 overflow-hidden rounded-lg">
                        <img src="{{ $medicine->image ? asset('img/' . $medicine->image) : asset('img/default-obat.jpg') }}" class="h-full w-full object-contain">
                    </div>
                    <div>
                        <h3 class="text-lg my-2 font-bold text-gray-800 line-clamp-2 min-h-[3.5rem] flex items-center justify-center">
                            {{ $medicine->name }}
                        </h3>
                        <p class="text-[#018790] font-bold mb-4 text-xl">
                            Rp {{ number_format($medicine->price, 0, ',', '.') }}
                        </p>
                         <a href="{{ route('front.product.show', $medicine->slug) }}" class="block w-full py-2 bg-[#018790] hover:bg-[#006a70] text-white rounded-lg font-bold transition">Detail</a>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center py-10 text-gray-500">
                    <p>Belum ada produk yang tersedia saat ini.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $medicines->links() }}
            </div>

        @endfragment
        </div>
    </div>
</x-layout>