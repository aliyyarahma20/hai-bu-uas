<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ModuleBahasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('module_bahasas')->insert([
            [
            'nama' => 'Percakapan Sehari-hari',
            'slug' => 'percakapan-sehari-hari',
            'categories_id' => 1,
            'cover' => 'produc_covers/modul1.jpg',
            'description' => 'Saat berkomunikasi dengan orang lain, menyapa adalah hal pertama yang dilakukan untuk membuka percakapan. Nah, dalam mempelajari bahasa Sunda, kata sapaan juga menjadi salah satu materi dasar yang harus dikuasai.
            
                Beberapa frasa yang digunakan untuk menyapa dalam bahasa Sunda di antaranya:
                1. Wilujeng énjing = Selamat pagi
                2. Wilujeng siang = Selamat siang
                3. Wilujeng sonten = Selamat sore
                4. Wilujeng wengi = Selamat malam
                5. Kumaha damang? = Bagaimana kabarnya?
                6. Wilujeng tepang = Selamat bertemu
                7. Wilujeung sumping = Selamat datang
                8. Hatur nuhun = Terimakasih
                9. Punten = Permisi
                10. Muhun = Iya
                11. Hapunten = Maaf
                12. Sawangsulna = Sama-sama
                13. Ditampi = Diterima
                14. Teu sawios = Tidak apa-apa
                15. Teu acan = Belum',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
            ],
            [
            'nama' => 'Percakapan Sehari-hari',
            'slug' => 'percakapan-sehari-hari',
            'categories_id' => 2,
            'cover' => 'produc_covers/modul1.jpg',
            'description' => 'Saat berkomunikasi dengan orang lain, menyapa adalah hal pertama yang dilakukan untuk membuka percakapan. Nah, dalam mempelajari bahasa Jawa, kata sapaan juga menjadi salah satu materi dasar yang harus dikuasai.
            
                Beberapa frasa yang digunakan untuk menyapa dalam bahasa Jawa di antaranya:  
                1. Sugeng enjing = Selamat pagi
                2. Sugeng siang = Selamat siang
                3. Sugeng sonten = Selamat sore
                4. Sugeng dalu = Selamat malam
                5. Pripun kabare = Bagaimana kabarnya
                6. Sugeng ketemu = Selamat bertemu
                7. Sugeng rawuh = Selamat dating
                8. Matur nuwun = Terimakasih
                9. Ngapunten = Permisi
                10.Nggih = Iya
                11.Nyuwun pangapunten = Maaf
                12.Sami-sami = Sama-sama 
                13.Dipuntampi = Diterima
                14.Mboten = Tidak apa-apa
                15.Durung = Belum',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
            ],
            [
            'nama' => 'Level Bahasa',
            'slug' => 'level bahasa',
            'categories_id' => 1,
            'cover' => 'produc_covers/modul2.png',
            'description' => 'Dalam bahasa Sunda, terdapat sistem tingkat bahasa yang disebut "undak-usuk basa", yang mengatur gaya bicara berdasarkan hubungan sosial, situasi, atau tingkat kesopanan. 
                Tingkat pertama adalah basa lemes, yaitu bahasa yang halus dan penuh hormat, digunakan saat berbicara dengan orang yang lebih tua, dihormati, atau dalam situasi formal. 
                Contohnya adalah ungkapan seperti "Kumaha damang?" (Bagaimana kabarnya?), yang menunjukkan kesopanan dan penghormatan kepada lawan bicara.

                Tingkat kedua adalah basa sedeng atau basa loma, yaitu bahasa yang bersifat netral dan santai. 
                Level ini digunakan dalam percakapan sehari-hari dengan teman sebaya, keluarga dekat, atau orang yang sudah akrab. 
                Contohnya adalah "Kumaha kaayaan anjeun?" (Bagaimana keadaan kamu?), yang lebih santai tetapi tetap sopan. 
                Sementara itu, tingkat terakhir adalah basa kasar, yaitu bahasa yang cenderung kurang sopan atau informal. 
                Bahasa ini biasanya digunakan dalam situasi bercanda, kemarahan, atau saat berbicara dengan teman sangat dekat. 
                Contohnya adalah "Kumaha euy?" (Bagaimana sih?), yang mengesankan kedekatan tetapi kurang formal.

                Penggunaan undak-usuk basa ini mencerminkan tata krama masyarakat Sunda dan penting untuk menjaga harmoni sosial serta menunjukkan rasa hormat kepada orang lain.',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'nama' => 'Level Bahasa',
            'slug' => 'level bahasa',
            'categories_id' => 2,
            'cover' => 'produc_covers/modul2.png',
            'description' => 'Dalam bahasa Sunda, terdapat sistem tingkat bahasa yang disebut "undak-usuk basa", yang mengatur gaya bicara berdasarkan hubungan sosial, situasi, atau tingkat kesopanan. 
                Tingkat pertama adalah basa lemes, yaitu bahasa yang halus dan penuh hormat, digunakan saat berbicara dengan orang yang lebih tua, dihormati, atau dalam situasi formal. 
                Contohnya adalah ungkapan seperti "Kumaha damang?" (Bagaimana kabarnya?), yang menunjukkan kesopanan dan penghormatan kepada lawan bicara.

                Tingkat kedua adalah basa sedeng atau basa loma, yaitu bahasa yang bersifat netral dan santai. 
                Level ini digunakan dalam percakapan sehari-hari dengan teman sebaya, keluarga dekat, atau orang yang sudah akrab. 
                Contohnya adalah "Kumaha kaayaan anjeun?" (Bagaimana keadaan kamu?), yang lebih santai tetapi tetap sopan. 
                Sementara itu, tingkat terakhir adalah basa kasar, yaitu bahasa yang cenderung kurang sopan atau informal. 
                Bahasa ini biasanya digunakan dalam situasi bercanda, kemarahan, atau saat berbicara dengan teman sangat dekat. 
                Contohnya adalah "Kumaha euy?" (Bagaimana sih?), yang mengesankan kedekatan tetapi kurang formal.

                Penggunaan undak-usuk basa ini mencerminkan tata krama masyarakat Sunda dan penting untuk menjaga harmoni sosial serta menunjukkan rasa hormat kepada orang lain.',
    
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ],   
        ]);
    }
}
