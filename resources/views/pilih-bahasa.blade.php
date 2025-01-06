<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Bahasa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Tambahkan transisi smooth */
        .transition-slide {
            transition: transform 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen relative">

    <div class="relative w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden flex">

        <!-- Bagian Kiri: Pilihan Bahasa -->
        <div class="w-1/2 bg-[#4B5945] text-white p-8">
            <form action="{{ route('pilih.bahasa.store') }}" method="POST">
                @csrf
                <div class="max-w-md mx-auto space-y-6">
                    <div class="space-y-6">
                        <p class="text-lg font-medium text-center text-neutral-300">Pilih Bahasa</p>
                        <div class="relative space-y-8 pt-2">
                            @forelse($categories as $category)
                            <label class="font-semibold flex items-center gap-[10px]">
                                <input
                                type="radio"
                                value="{{ $category->id }}"
                                name="categories_id"
                                class="w-[24px] h-[24px] appearance-none checked:border-[3px] checked:border-solid checked:border-white rounded-full checked:bg-[#B2C9AD] ring ring-[#EEEEEE]"
                                />
                                {{ $category->name }}
                            </label>
                            @empty
                                <p class="text-center text-sm">Tidak ada kategori tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Tombol Simpan -->
                <div class="mt-6 text-center">
                    <button type="submit" class="w-full bg-[#B2C9AD] hover:bg-white text-[#4B5945] py-2 rounded-lg">
                        Simpan Pilihan
                    </button>
                </div>
            </form>
        </div>
    
        <!-- Bagian Kanan: Ilustrasi dan Teks -->
        <div class="w-1/2 bg-gray-50 flex flex-col justify-center items-center p-8">
            <img src="{{ asset('image/hai-bu.png') }}" alt="Logo Hai-Bu" class="h-12 mb-4 self-start">
            <h2 class="text-3xl font-bold text-[#4B5945] mb-4 text-center leading-relaxed">
                Bahasa Lestari<br>
                Satukan Generasi.
            </h2>
            <img src="{{ asset('image/login.jpg') }}" alt="Ilustrasi" class="w-3/4 rounded-md shadow-md">
        </div>
    </div>    
</body>
</html>



   

