<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat - MedStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: radial-gradient(circle, rgba(200, 200, 200, 0.3) 1px, transparent 1px);
            background-size: 20px 20px;
            background-color: #e5e5e5;
            overflow: hidden;
        }
        .gradient-card { background: linear-gradient(135deg, #1eb2b2 0%, #1a9d9d 100%); }
        .input-bottom-border {
            border: none;
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            background: transparent;
            color: white;
            border-radius: 0;
        }
        .input-bottom-border:focus { outline: none; border-bottom: 2px solid white; }
        .input-bottom-border::placeholder { color: rgba(255, 255, 255, 0.7); }
        textarea.input-bottom-border {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 12px;
            resize: none;
        }
        select.input-bottom-border {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 24px;
            padding-right: 40px;
        }
        .image-placeholder { background: white; border: 3px dashed rgba(0, 0, 0, 0.2); }
        input[type="file"] { display: none; }
    </style>
</head>
<body class="h-screen flex items-center justify-center font-sans bg-cover bg-center bg-no-repeat bg-gray-100"
      style="background-image: url('{{ asset('img/log_bg.jpg') }}');">
    
    <div class="gradient-card rounded-3xl shadow-2xl w-[90%] h-[92vh] p-6 flex flex-col overflow-hidden">
        
        <h1 class="text-white text-3xl font-bold text-center mb-4">Edit Obat</h1>

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-3 rounded text-sm" role="alert">
            <p class="font-bold">Berhasil!</p>
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <form action="{{ route('obat.update', $medicine->id) }}" method="POST" enctype="multipart/form-data" id="obatForm" class="flex-1 flex flex-col overflow-hidden">
            @csrf
            @method('PUT') <div class="grid grid-cols-2 gap-6 flex-1 overflow-hidden">
                
                <div class="space-y-3 overflow-y-auto pr-2">
                    
                    <div>
                        <label class="text-white text-base font-semibold mb-1 block">Nama obat</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name"
                            value="{{ $medicine->name }}"
                            class="input-bottom-border w-full text-white text-sm py-2 px-0"
                            required
                        >
                    </div>

                    <div>
                        <label class="text-white text-base font-semibold mb-1 block">Kategori</label>
                        <select 
                            name="category_id" 
                            id="category_id"
                            class="input-bottom-border w-full text-white text-sm py-2 px-0"
                            required
                        >
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach(App\Models\Category::all() as $cat)
                                <option value="{{ $cat->id }}" {{ $medicine->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-white text-base font-semibold mb-1 block">Harga</label>
                        <input 
                            type="number" 
                            name="price" 
                            id="price"
                            value="{{ $medicine->price }}"
                            class="input-bottom-border w-full text-white text-sm py-2 px-0"
                            required
                        >
                    </div>

                    <div>
                        <label class="text-white text-base font-semibold mb-1 block">Stock</label>
                        <input 
                            type="number" 
                            name="stock" 
                            id="stock"
                            value="{{ $medicine->stock }}"
                            class="input-bottom-border w-full text-white text-sm py-2 px-0"
                            required
                        >
                    </div>

                    <div class="flex-1 flex flex-col">
                        <label class="text-white text-base font-semibold mb-1 block">Deskripsi</label>
                        <textarea 
                            name="description" 
                            id="description"
                            class="input-bottom-border w-full text-white text-sm py-2 px-3 flex-1"
                            rows="3"
                        >{{ $medicine->description }}</textarea>
                    </div>

                </div>

                <div class="flex flex-col items-center justify-center">
                    
                    <div class="image-placeholder rounded-2xl w-64 h-64 flex items-center justify-center mb-4 overflow-hidden" id="imagePreviewBox">
                        @if($medicine->image)
                        <img id="imagePreview" class="w-full h-full object-cover" src="{{ asset('img/' . $medicine->image) }}" alt="">
                        @else
                        <div id="placeholderContent" class="text-center">
                             <svg class="w-20 h-20 mx-auto text-gray-400 mb-2" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                        </div>
                        <img id="imagePreview" class="hidden w-full h-full object-cover" src="" alt="">
                        @endif
                    </div>

                    <label for="image" class="bg-teal-700 hover:bg-teal-800 text-white font-bold text-base py-3 px-10 rounded-full cursor-pointer transition-all duration-300 shadow-lg hover:shadow-xl">
                        Pilih gambar
                    </label>
                    <input 
                        type="file" 
                        id="image" 
                        name="image" 
                        accept="image/jpeg,image/png,image/jpg"
                        onchange="previewImage(event)"
                    >
                </div>

            </div>

            <div class="flex justify-center gap-4 mt-4">
                <a href="{{ route('obat.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold text-base py-3 px-10 rounded-full transition-all duration-300 shadow-lg">
                    Batal
                </a>
                <button type="submit" class="bg-teal-700 hover:bg-teal-800 text-white font-bold text-base py-3 px-16 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('placeholderContent');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>