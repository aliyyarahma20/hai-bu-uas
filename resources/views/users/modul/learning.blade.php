<!DOCTYPE html>
<html>
<head>
    <title>Language Modules</title>
    @vite(['resources/js/app.jsx'])
</head>
<body>
    <div id="modules-container">
        @forelse ($modules as $index => $module)
        <div id="module-container-{{ $index }}"
            data-module='@json([
                "nama" => $module->nama,
                "description" => $module->description
            ])'>
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
