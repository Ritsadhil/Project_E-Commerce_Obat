@extends('components.admin')

@section('content')
    <div class="flex gap-4 mb-8">
        <a href="{{ route('obat.create') }}" 
           class="bg-[#00897b] hover:bg-[#00796b] text-white font-bold py-2 px-6 rounded-2xl shadow-md transition inline-block text-center">
            Tambah Obat
        </a>
        <button class="bg-[#00897b] hover:bg-[#00796b] text-white font-bold py-2 px-6 rounded-2xl shadow-md transition">
            Cetak laporan obat
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
       @foreach($medicines as $obat)
<div class="bg-white p-4 rounded-xl border border-gray-300 shadow-sm flex flex-col justify-between hover:shadow-lg transition duration-300">
    
    <div class="h-40 w-full flex items-center justify-center mb-4 bg-white rounded-lg p-2">
       <img src="{{ $obat->image ? asset('img/' . $obat->image) : asset('img/default.png') }}" 
         alt="{{ $obat->name }}" 
         class="max-h-full max-w-full object-contain">
    </div>
    
    <div class="w-full text-left mb-4 px-1">
        <h3 class="font-bold text-lg text-black leading-tight mb-1">
            {{ $obat->name }}
        </h3>
        
        <p class="text-black font-semibold text-base">
            Rp {{ number_format($obat->price, 0, ',', '.') }}
        </p>

        <p class="text-gray-500 text-xs mt-1">
            Stok: {{ $obat->stock }}
        </p>
    </div>
    
    <a href="{{ route('obat.edit', $obat->id) }}" 
               class="w-full bg-[#00897b] hover:bg-[#00796b] text-white font-bold py-2 rounded-lg transition shadow-sm block text-center">
                Edit
            </a>
</div>
@endforeach
        </div>
@endsection