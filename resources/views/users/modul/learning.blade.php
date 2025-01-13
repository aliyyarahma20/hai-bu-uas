@vite(['resources/js/app.jsx'])

<div 
    id="module-container" 
    data-modul="{{ json_encode([
        'nama' => $modul->nama,
        'deskripsi' => $modul->deskripsi
    ]) }}"
>
</div>