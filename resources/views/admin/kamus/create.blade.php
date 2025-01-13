@extends('layouts.template')

@section('title', 'Kamus Baru - Hai Bu')
    
@section('content')
<div id="menu-content" class="flex flex-col w-full pb-[30px]">
    {{-- Content --}}
    <div class="flex flex-col gap-10 px-5 mt-5">
        <div class="breadcrumb flex items-center gap-[30px]">
            <a href="{{ route('dashboard.module-bahasa.index')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Beranda</a>
            <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
            <a href="{{route('dashboard.kamus.index')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Semua Kamus</a>
            <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
            <a href="{{ route('dashboard.kamus.create')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Kamus Baru</a>
        </div>
    </div>
    <div class="header flex flex-col gap-1 px-5 mt-5">
        <h1 class="font-extrabold text-[30px] leading-[45px]">Tambah Kamus Baru</h1>
    </div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li class="py-5 px-5 bg-red-700 text-white">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        @endif



    <form method="POST" enctype="multipart/form-data" action="{{route('dashboard.kamus.store')}}" class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10">
        @csrf
        <div class="group/category flex flex-col gap-[10px]">
            <p class="font-semibold">Kategori Bahasa</p>
            <div class="peer flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                    <img src="{{asset('images/icons/bill.svg')}}" class="w-full h-full object-contain" alt="icon">
                </div>
                <select id="category" class="pl-1 font-semibold focus:outline-none w-full text-[#0A090B] invalid:text-[#7F8190] invalid:font-normal appearance-none bg-[url('{{asset('images/icons/arrow-down.svg')}}')] bg-no-repeat bg-right " 
                name="categories_id" required>
                    <option value="" disabled selected hidden>Pilih satu kategori bahasa</option>
                    @forelse($categories as $category)
                    <option value="{{$category->id}}" class="font-semibold">
                        {{$category->name}}
                    </option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div class="flex flex-col gap-[10px]">
            <p class="font-semibold">Link Kamus</p>
            <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                    <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                </div>
                <input  type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" name="link" required>
            </div>
        </div>        
        
        <div class="flex items-center gap-5">
            <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#91AC8F] rounded-full font-bold text-white transition-all duration-300 hover:bg-[#66785F] text-center">Simpan Kamus</button>
        </div>
    </form>
</div>

@endsection

<script>
    function previewFile() {
        var preview = document.querySelector('.file-preview');
        var fileInput = document.querySelector('input[type=file]');

        if (fileInput.files.length > 0) {
            var reader = new FileReader();
            var file = fileInput.files[0]; // Get the first file from the input

            reader.onloadend = function () {
                var img = preview.querySelector('.thumbnail-icon'); // Get the thumbnail image element
                img.src = reader.result; // Update src attribute with the uploaded file
                preview.classList.remove('hidden'); // Remove the 'hidden' class to display the preview
            }

            reader.readAsDataURL(file);
            fileInput.setAttribute('data-empty', 'false');
        } else {
            preview.classList.add('hidden'); // Hide preview if no file selected
            fileInput.setAttribute('data-empty', 'true');
        }
    }
</script>

<script>
    function handleActiveAnchor(element) {
        event.preventDefault();

        const group = element.getAttribute('data-group');
        
        // Reset all elements' aria-checked to "false" within the same data-group
        const allElements = document.querySelectorAll(`[data-group="${group}"][aria-checked="true"]`);
        allElements.forEach(el => {
            el.setAttribute('aria-checked', 'false');
        });
        
        // Set the clicked element's aria-checked to "true"
        element.setAttribute('aria-checked', 'true');
    }
</script>