<!DOCTYPE html>
<html>
<head>
    <title>Language Modules</title>
    @vite(['resources/js/app.jsx'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="modules-container">
        @forelse ($modules as $index => $module)
        <div id="module-container-{{ $index }}"
            data-module="{{ json_encode([
                'nama' => $module->nama,
                'id' => $module->id,
                'isBookmarked' => auth()->check() ? auth()->user()->bookmarks()->where('module_bahasa_id', $module->id)->exists() : false,
                'bookmarkId' => auth()->check() ? auth()->user()->bookmarks()->where('module_bahasa_id', $module->id)->first()?->id : null
            ]) }}">
        </div>
        @empty
            <p>Tidak ada modul tersedia</p>
        @endforelse
    </div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[id^="module-container-"]').forEach(container => {
            try {
                const moduleData = JSON.parse(container.dataset.module.replace(/'/g, '"'));
                console.log('Parsed data:', moduleData);
                
                const root = ReactDOM.createRoot(container);
                root.render(
                    React.createElement(LanguageModule, { 
                        module: moduleData,
                        key: container.id 
                    })
                );
            } catch (error) {
                console.error('Error detail:', error);
                container.innerHTML = `<p>Error loading module: ${error.message}</p>`;
            }
        });
    });
</script> 
</body>
</html>
