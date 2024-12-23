<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $page->title }}</title>
    <link href="{{ asset('grapesjs/css/grapes.min.css') }}" rel="stylesheet">
    <script src="{{ asset('grapesjs/js/grapes.min.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-preset-webpage.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-preset-newsletter.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-navbar.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-plugin-forms.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-preset-webpage.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-component-countdown.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-plugin-export.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-tabs.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-custom-code.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-touch.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-parser-postcss.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-tooltip.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-tui-image-editor.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-typed.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-style-bg.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-blocks-flexbox.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-blocks-basic.js') }}"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        /* Sembunyikan editor pada saat pertama kali dimuat */
        #gjs {
            height: 0px;
            overflow: hidden;
            display: none; /* Sembunyikan editor */
        }
    </style>
</head>

<body>
    <div id="gjs" style="height:0px; overflow:hidden">
        {!! $page->content !!}
    </div>
    <div id="blocks"></div>

    <script type="text/javascript">
        const projectId = '{{ $page->id }}'
        const loadProjectEndpoint = `{{ url('/api/pages/${projectId}/load-project') }}`;
        // const storeProjectEndpoint = `{{ url('/api/pages/${projectId}/store-project') }}`;

        window.editor = grapesjs.init({
            height: '100%',
            container: '#gjs',
            fromElement: true,
            showOffsets: true,
            selectorManager: { componentFirst: true },

            storageManager: {
                type: 'remote',
                stepsBeforeSave: 1,
                options: {
                    remote: {
                        urlLoad: loadProjectEndpoint,
                        // urlStore: storeProjectEndpoint,
                        fetchOptions: opts => (opts.method === 'POST' ? { method: 'PATCH' } : {}),
                        onStore: data => ({ id: projectId, data }),
                        onLoad: result => result.data,
                    }
                }
            }
        });

        // Masuk ke mode preview dan tampilkan editor setelah halaman dimuat
        editor.on('load', () => {
            editor.runCommand('core:preview');
            // Tampilkan editor setelah preview mode diaktifkan
            document.getElementById('gjs').style.display = 'block'; 
        });
    </script>

</body>

</html>
