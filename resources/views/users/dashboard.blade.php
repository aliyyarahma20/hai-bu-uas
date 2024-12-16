<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hai-bu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .jarak-antar-kata {
            word-spacing: 10px; /* Atur jarak antar kata */
        }
    </style>
</head>
<body>
    <section class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="font-extrabold text-[#4B5945] sm:text-5xl">
                    COMING SOON ! 
                </h1>
                <span class="flex justify-center items-center">
                    <img  class="justify-center mt-8 h-20 w-auto" src="{{asset('image/hai-bu.png')}}" alt="" />
                </span>
                <p class="mt-4 sm:text-xl/relaxed text-[#4B5945]">
                    Platform yang menghubungkan Anda dengan keindahan <br> 
                    dan kekayaan bahasa daerah segera hadir!
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a
                        class="block w-full rounded bg-[#4B5945] px-12 py-3 text-sm font-medium text-white shadow hover:bg-[#B2C9AD] hover:text-[#4B5945] active:bg-[#91AC8F] sm:w-auto"
                        href="{{route('landingpage')}}">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>