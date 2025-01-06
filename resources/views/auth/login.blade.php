<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register Page</title>
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

    <!-- Tombol Panah ke Kiri -->
    <!-- <a
    class="absolute top-20 left-16 m-8 inline-block rounded-full border border-[#4B5945] bg-[#4B5945] p-3 text-white hover:bg-transparent hover:text-[#4B5945] focus:outline-none focus:ring active:text-indigo-500"
    style="left: 250px;"
    href="landingpage.html"
    >
    <span class="sr-only"> Kembali </span> -->

    <!-- Ikon Panah ke Kiri -->
    <!-- <svg
        class="size-5"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M14 19l-7-7m0 0l7-7m-7 7h14"
        />
    </svg>
    </a> -->

    <!-- Container utama untuk slide -->
    <div class="relative w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden flex">

        <!-- Wrapper Slide -->
        <div class="w-full flex transition-slide" id="slider">

            <!-- Login Page -->
            <div id="login-page" class="w-full flex-shrink-0 flex">
                <!-- Form Login -->
                <div class="w-1/2 bg-[#4B5945] text-white p-8">
                    <h1 class="text-3xl font-bold mb-6">Masuk</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" :value="__('Email')" class="block text-sm mb-2">Email</label>
                            <input type="email" id="email" name="email" :value="old('email')" placeholder="alamat email" class="w-full px-4 py-2 rounded-lg bg-gray-100 text-gray-900 focus:ring-2 focus:ring-[#B2C9AD] focus:outline-none">
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-yellow-500" />
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-sm mb-2">Sandi</label>
                            <input type="password" id="password" name="password" placeholder="kata sandi" class="w-full px-4 py-2 rounded-lg bg-gray-100 text-gray-900 focus:ring-2 focus:ring-[#B2C9AD] focus:outline-none">
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-yellow-500" />
                        </div>
                        <div class="block mb-6">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <button type="submit" class="w-full bg-[#B2C9AD] hover:bg-white text-[#4B5945] py-2 rounded-lg">Lanjutkan</button>
                    </form>
                    <p class="text-sm mt-4">Belum memiliki akun? <a href="{{route('register')}}" id="go-login" class="text-green-200 hover:underline"> Bergabung bersama kami!</a></p>
                </div>

                <!-- Ilustrasi -->
                <div class="w-1/2 bg-gray-50 flex flex-col justify-center items-center p-8">
                    <img src="{{asset('image/hai-bu.png')}}" alt="Illustration" class="h-12 mb-4 self-start">
                    <h2 class="text-3xl font-bold text-[#4B5945] mb-4 text-right">
                        Bahasa Lestari<br>
                        Satukan Generasi.
                    </h2>
                    <img src="{{asset('image/login.jpg')}}" alt="Illustration" class="w-3/4">
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const slider = document.getElementById('slider');
        const registerLink = document.getElementById('go-register');
        const loginLink = document.getElementById('go-login');

        // Event saat klik "bergabung bersama kami"
        registerLink.addEventListener('click', (e) => {
            e.preventDefault();
            slider.style.transform = 'translateX(-100%)';
        });

        // Event saat klik "masuk"
        loginLink.addEventListener('click', (e) => {
            e.preventDefault();
            slider.style.transform = 'translateX(0)';
        });
    </script>

</body>
</html>