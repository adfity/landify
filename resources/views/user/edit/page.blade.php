<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page->title }}</title>
    <link href="{{ asset('grapesjs/css/grapes.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="{{ asset('grapesjs/js/grapes.min.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-preset-webpage.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-preset-newsletter.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-navbar.js') }}"></script>
    <script src="{{ asset('grapesjs/js/grapesjs-plugin-forms.js') }}"></script>
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
        body, html {
            height: 100%;
            margin: 0;
        }

        /* ================================================================
           Tema editor: putih + border hitam tipis, mirip halaman lain
           ================================================================ */

        :root {
            --header-height: 64px;
            --sidebar-width: 240px;
            --border-color: #111827;
            --icon-color: #111827;
            --icon-hover-bg: #f3f4f6;
            --icon-active-bg: #eef2ff;
            --icon-active-color: #4f46e5;
            --accent: #4f46e5;

            --gjs-canvas-top: var(--header-height);
            --gjs-left-width: var(--sidebar-width);
        }

        /* ==== Header custom (logo, nav, device switcher, action buttons) ==== */
        .editor-topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 10;
            box-sizing: border-box;
        }

        .editor-topbar__brand {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .editor-topbar__brand img {
            height: 32px;
            display: block;
        }

        .editor-topbar__nav {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .editor-topbar__nav a {
            color: #111827;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
        }

        .editor-topbar__nav a:hover {
            color: var(--accent);
        }

        .editor-topbar__actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ==== Device switcher (desktop/tablet/mobile): dipindah ke tengah header ==== */
        .gjs-pn-devices-c {
            top: 14px !important;
            left: 50% !important;
            right: auto !important;
            transform: translateX(-50%);
            display: flex;
            gap: 4px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 3px;
            z-index: 11;
        }

        .gjs-pn-devices-c .gjs-pn-btn {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            color: #6b7280;
        }

        .gjs-pn-devices-c .gjs-pn-btn:hover {
            background: #ffffff;
        }

        .gjs-pn-devices-c .gjs-pn-btn.gjs-pn-active {
            background: #ffffff;
            color: var(--accent);
            box-shadow: 0 1px 2px rgba(0,0,0,0.08);
        }

        .editor-btn {
            font-size: 14px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background: #ffffff;
            color: #111827;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background-color 0.15s ease;
        }

        .editor-btn:hover {
            background: var(--icon-hover-bg);
        }

        .editor-btn--outline {
            border-color: #c7d2fe;
            color: var(--accent);
        }

        .editor-btn--outline:hover {
            background: #eef2ff;
        }

        .editor-btn--primary {
            background: var(--accent);
            border-color: var(--accent);
            color: #ffffff;
        }

        .editor-btn--primary:hover {
            background: #4338ca;
        }

        /* ==== Canvas: geser ke kanan (sidebar) & ke bawah (header) ==== */
        .gjs-cv-canvas {
            left: var(--sidebar-width) !important;
            width: calc(100% - var(--sidebar-width)) !important;
            top: var(--header-height) !important;
            height: calc(100% - var(--header-height)) !important;
        }

        /* ================================================================
           Sidebar dibangun sendiri (rail icon + drawer konten), TIDAK pakai
           sistem panel bawaan GrapesJS lagi (itu sumber bug horizontal/coklat
           sebelumnya karena ada theme + style yang di-inject ulang oleh
           plugin dan susah dikalahkan). GrapesJS cuma dipakai isi kontennya
           lewat appendTo (blockManager, layerManager, styleManager, dst).
           ================================================================ */

        /* Sembunyikan total panel bawaan GrapesJS (views, views-container, options) */
        .gjs-pn-views,
        .gjs-pn-views-container,
        .gjs-pn-options {
            display: none !important;
        }

        /* Canvas: geser ke kanan (rail 64px) & ke bawah (header) */
        .gjs-cv-canvas {
            left: 64px !important;
            width: calc(100% - 64px) !important;
            top: var(--header-height) !important;
            height: calc(100% - var(--header-height)) !important;
        }

        /* ==== Rail icon (strip vertikal, selalu terlihat, 64px) ==== */
        .editor-rail {
            position: fixed;
            top: var(--header-height);
            left: 0;
            bottom: 0;
            width: 64px;
            background: #ffffff;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 14px 0;
            gap: 10px;
            z-index: 8;
        }

        .editor-rail__spacer {
            flex: 1;
        }

        .rail-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: transparent;
            border-radius: 8px;
            color: var(--icon-color);
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.15s ease, color 0.15s ease;
            flex-shrink: 0;
        }

        .rail-btn:hover {
            background: var(--icon-hover-bg);
        }

        .rail-btn.is-active {
            background: var(--icon-active-bg);
            color: var(--icon-active-color);
        }

        /* ==== Drawer konten (Blocks/Layers/Style/Settings), muncul di samping rail ==== */
        .editor-drawer {
            position: fixed;
            top: var(--header-height);
            left: 64px;
            bottom: 0;
            width: 280px;
            background: #ffffff;
            border-right: 1px solid var(--border-color);
            overflow-y: auto;
            z-index: 7;
            display: none;
        }

        .editor-drawer.is-open {
            display: block;
        }

        .editor-drawer__header {
            padding: 14px 16px;
            font-weight: 700;
            font-size: 14px;
            color: #111827;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            background: #ffffff;
        }

        .editor-drawer__body {
            padding: 12px;
        }

        /* Canvas bertambah lebar kalau ada drawer yang lagi kebuka */
        body.drawer-open .gjs-cv-canvas {
            left: calc(64px + 280px) !important;
            width: calc(100% - 64px - 280px) !important;
        }

        /* ==== List block (drag-drop komponen): 1 kolom vertikal ==== */
        .gjs-blocks-c {
            display: flex !important;
            flex-direction: column !important;
            flex-wrap: nowrap !important;
            gap: 6px;
        }

        .gjs-block {
            width: 100% !important;
            min-height: auto !important;
            margin: 0 !important;
            padding: 10px 12px !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: flex-start !important;
            gap: 12px;
            text-align: left !important;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .gjs-block:hover {
            border-color: var(--accent);
            box-shadow: 0 2px 6px rgba(79,70,229,0.2);
        }

        .gjs-block-label {
            font-size: 13px !important;
        }

        /* Icon block (SVG) sempat collapse jadi 0px pas dipaksa flex-row,
           kasih ukuran eksplisit biar tetap kelihatan */
        .gjs-block__media {
            margin-bottom: 0 !important;
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
        }

        .gjs-block__media svg {
            width: 20px !important;
            height: 20px !important;
        }

        .gjs-sm-sector .gjs-sm-title,
        .gjs-layer-title,
        .gjs-trt-trait .gjs-label {
            font-weight: 600;
            color: #111827;
        }

        /* Tema coklat bawaan plugin (di-inject belakangan) tetap dipaksa putih,
           jaga-jaga elemen lain (mis. dialog import/export) masih makai class ini */
        .gjs-one-bg, .gjs-two-bg, .gjs-three-bg, .gjs-four-bg {
            background-color: #ffffff !important;
        }

        .gjs-one-color,
        .gjs-two-color,
        .gjs-three-color,
        .gjs-four-color {
            color: #111827 !important;
        }


        /* ==== Mode Preview: sembunyikan header & sidebar, canvas full layar ==== */
        body.is-previewing .editor-topbar,
        body.is-previewing .editor-rail,
        body.is-previewing .editor-drawer {
            display: none !important;
        }

        body.is-previewing .gjs-cv-canvas {
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            height: 100% !important;
        }

        #btnExitPreview {
            display: none;
            position: fixed;
            top: 16px;
            right: 16px;
            z-index: 9999;
        }

        body.is-previewing #btnExitPreview {
            display: inline-flex;
        }
    </style>
</head>

<body>
    <header class="editor-topbar">
        <div class="editor-topbar__brand">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Landify') }}">
            <nav class="editor-topbar__nav">
                <a href="{{ route('user.editor') }}">Site</a>
                <a href="#">Settings</a>
                <a href="#">Help</a>
            </nav>
        </div>
        <!-- Device switcher (desktop/tablet/mobile) dari GrapesJS diposisikan di tengah header lewat CSS -->
        <div class="editor-topbar__actions">
            <button type="button" id="btnPreview" class="editor-btn editor-btn--outline">Preview</button>
            <button type="button" id="btnSave" class="editor-btn editor-btn--outline">Save</button>
            <button type="button" id="btnPublish" class="editor-btn editor-btn--primary">Publish</button>
        </div>
    </header>

    <!-- ==== Rail icon custom (bukan panel bawaan GrapesJS) ==== -->
    <aside class="editor-rail">
        <button type="button" class="rail-btn" data-drawer="blocks" title="Blocks">
            <i class="fa-regular fa-square-plus"></i>
        </button>
        <button type="button" class="rail-btn" data-drawer="layers" title="Layers">
            <i class="fa-regular fa-file"></i>
        </button>
        <button type="button" class="rail-btn" data-action="open-assets" title="Assets">
            <i class="fa-regular fa-image"></i>
        </button>
        <button type="button" class="rail-btn" data-drawer="styles" title="Style">
            <i class="fa-solid fa-paintbrush"></i>
        </button>
        <button type="button" class="rail-btn" data-drawer="traits" title="Settings">
            <i class="fa-solid fa-table-cells"></i>
        </button>

        <div class="editor-rail__spacer"></div>

        <button type="button" class="rail-btn" data-action="core:undo" title="Undo">
            <i class="fa-solid fa-rotate-left"></i>
        </button>
        <button type="button" class="rail-btn" data-action="core:redo" title="Redo">
            <i class="fa-solid fa-rotate-right"></i>
        </button>
        <button type="button" class="rail-btn" data-action="core:fullscreen" title="Fullscreen">
            <i class="fa-solid fa-expand"></i>
        </button>
        <button type="button" class="rail-btn" data-action="export-template" title="View Code">
            <i class="fa-solid fa-code"></i>
        </button>
        <button type="button" class="rail-btn" data-action="gjs-open-import-webpage" title="Import">
            <i class="fa-solid fa-file-import"></i>
        </button>
        <button type="button" class="rail-btn" data-action="core:canvas-clear" title="Clear Canvas">
            <i class="fa-regular fa-trash-can"></i>
        </button>

        <a href="{{ route('user.editor') }}" class="rail-btn" title="Keluar dari editor">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </aside>

    <!-- ==== Drawer konten: isinya diisi GrapesJS lewat appendTo ==== -->
    <div class="editor-drawer" id="drawer-blocks">
        <div class="editor-drawer__header">Blocks</div>
        <div class="editor-drawer__body" id="drawer-blocks-body"></div>
    </div>

    <div class="editor-drawer" id="drawer-layers">
        <div class="editor-drawer__header">Layers</div>
        <div class="editor-drawer__body" id="drawer-layers-body"></div>
    </div>

    <div class="editor-drawer" id="drawer-styles">
        <div class="editor-drawer__header">Style</div>
        <div id="drawer-styles-selector"></div>
        <div class="editor-drawer__body" id="drawer-styles-body"></div>
    </div>

    <div class="editor-drawer" id="drawer-traits">
        <div class="editor-drawer__header">Settings</div>
        <div class="editor-drawer__body" id="drawer-traits-body"></div>
    </div>

    <button type="button" id="btnExitPreview" class="editor-btn editor-btn--outline">
        <i class="fa-solid fa-xmark"></i> Keluar Preview
    </button>

    <div id="gjs" style="height:0px; overflow:hidden">
        {!! $page->content !!}
    </div>

    <script type="text/javascript">

        const projectId = '{{ $page->id }}'
        const loadProjectEndpoint = `{{ url('/api/pages/${projectId}/load-project') }}`;
        const storeProjectEndpoint = `{{ url('/api/pages/${projectId}/store-project') }}`;

        window.editor = grapesjs.init({
            height: '100%',
            container: '#gjs',
            fromElement: true,
            showOffsets: true,
            blockManager: {
                appendTo: '#drawer-blocks-body'
            },
            layerManager: {
                appendTo: '#drawer-layers-body'
            },
            traitManager: {
                appendTo: '#drawer-traits-body'
            },
            selectorManager: {
                componentFirst: true,
                appendTo: '#drawer-styles-selector'
            },
            storageManager: {
                type: 'remote',
                stepsBeforeSave: 1,
                options: {
                    remote: {
                        urlLoad: loadProjectEndpoint,
                        urlStore: storeProjectEndpoint,
                        fetchOptions: opts => (opts.method === 'POST' ? {
                            method: 'PATCH'
                        } : {}),
                        onStore: data => ({
                            id: projectId,
                            data
                        }),
                        onLoad: result => result.data,
                    }
                }
            },
            styleManager: {
                appendTo: '#drawer-styles-body',
                sectors: [
                    {
                        name: 'General',
                        properties: [
                            {
                                extend: 'float',
                                type: 'radio',
                                default: 'none',
                                options: [
                                    { value: 'none', className: 'fa fa-times' },
                                    { value: 'left', className: 'fa fa-align-left' },
                                    { value: 'right', className: 'fa fa-align-right' }
                                ],
                            },
                            'display',
                            {
                                extend: 'position',
                                type: 'select'
                            },
                            'top',
                            'right',
                            'left',
                            'bottom',
                        ],
                    },
                    {
                        name: 'Dimension',
                        open: false,
                        properties: [
                            'width',
                            {
                                id: 'flex-width',
                                type: 'integer',
                                name: 'Width',
                                units: ['px', '%'],
                                property: 'flex-basis',
                                toRequire: 1,
                            },
                            'height',
                            'max-width',
                            'min-height',
                            'margin',
                            'padding'
                        ],
                }, {
                    name: 'Typography',
                    open: false,
                    properties: [
                        'font-family',
                        'font-size',
                        'font-weight',
                        'letter-spacing',
                        'color',
                        'line-height',
                        {
                            extend: 'text-align',
                            options: [{
                                    id: 'left',
                                    label: 'Left',
                                    className: 'fa fa-align-left'
                                },
                                {
                                    id: 'center',
                                    label: 'Center',
                                    className: 'fa fa-align-center'
                                },
                                {
                                    id: 'right',
                                    label: 'Right',
                                    className: 'fa fa-align-right'
                                },
                                {
                                    id: 'justify',
                                    label: 'Justify',
                                    className: 'fa fa-align-justify'
                                }
                            ],
                        },
                        {
                            property: 'text-decoration',
                            type: 'radio',
                            default: 'none',
                            options: [{
                                    id: 'none',
                                    label: 'None',
                                    className: 'fa fa-times'
                                },
                                {
                                    id: 'underline',
                                    label: 'underline',
                                    className: 'fa fa-underline'
                                },
                                {
                                    id: 'line-through',
                                    label: 'Line-through',
                                    className: 'fa fa-strikethrough'
                                }
                            ],
                        },
                        'text-shadow'
                    ],
                }, {
                    name: 'Decorations',
                    open: false,
                    properties: [
                        'opacity',
                        'border-radius',
                        'border',
                        'box-shadow',
                        'background', // { id: 'background-bg', property: 'background', type: 'bg' }
                    ],
                }, {
                    name: 'Extra',
                    open: false,
                    buildProps: [
                        'transition',
                        'perspective',
                        'transform'
                    ],
                }, {
                    name: 'Flex',
                    open: false,
                    properties: [{
                        name: 'Flex Container',
                        property: 'display',
                        type: 'select',
                        defaults: 'block',
                        list: [{
                                value: 'block',
                                name: 'Disable'
                            },
                            {
                                value: 'flex',
                                name: 'Enable'
                            }
                        ],
                    }, {
                        name: 'Flex Parent',
                        property: 'label-parent-flex',
                        type: 'integer',
                    }, {
                        name: 'Direction',
                        property: 'flex-direction',
                        type: 'radio',
                        defaults: 'row',
                        list: [{
                            value: 'row',
                            name: 'Row',
                            className: 'icons-flex icon-dir-row',
                            title: 'Row',
                        }, {
                            value: 'row-reverse',
                            name: 'Row reverse',
                            className: 'icons-flex icon-dir-row-rev',
                            title: 'Row reverse',
                        }, {
                            value: 'column',
                            name: 'Column',
                            title: 'Column',
                            className: 'icons-flex icon-dir-col',
                        }, {
                            value: 'column-reverse',
                            name: 'Column reverse',
                            title: 'Column reverse',
                            className: 'icons-flex icon-dir-col-rev',
                        }],
                    }, {
                        name: 'Justify',
                        property: 'justify-content',
                        type: 'radio',
                        defaults: 'flex-start',
                        list: [{
                            value: 'flex-start',
                            className: 'icons-flex icon-just-start',
                            title: 'Start',
                        }, {
                            value: 'flex-end',
                            title: 'End',
                            className: 'icons-flex icon-just-end',
                        }, {
                            value: 'space-between',
                            title: 'Space between',
                            className: 'icons-flex icon-just-sp-bet',
                        }, {
                            value: 'space-around',
                            title: 'Space around',
                            className: 'icons-flex icon-just-sp-ar',
                        }, {
                            value: 'center',
                            title: 'Center',
                            className: 'icons-flex icon-just-sp-cent',
                        }],
                    }, {
                        name: 'Align',
                        property: 'align-items',
                        type: 'radio',
                        defaults: 'center',
                        list: [{
                            value: 'flex-start',
                            title: 'Start',
                            className: 'icons-flex icon-al-start',
                        }, {
                            value: 'flex-end',
                            title: 'End',
                            className: 'icons-flex icon-al-end',
                        }, {
                            value: 'stretch',
                            title: 'Stretch',
                            className: 'icons-flex icon-al-str',
                        }, {
                            value: 'center',
                            title: 'Center',
                            className: 'icons-flex icon-al-center',
                        }],
                    }, {
                        name: 'Flex Children',
                        property: 'label-parent-flex',
                        type: 'integer',
                    }, {
                        name: 'Order',
                        property: 'order',
                        type: 'integer',
                        defaults: 0,
                        min: 0
                    }, {
                        name: 'Flex',
                        property: 'flex',
                        type: 'composite',
                        properties: [{
                            name: 'Grow',
                            property: 'flex-grow',
                            type: 'integer',
                            defaults: 0,
                            min: 0
                        }, {
                            name: 'Shrink',
                            property: 'flex-shrink',
                            type: 'integer',
                            defaults: 0,
                            min: 0
                        }, {
                            name: 'Basis',
                            property: 'flex-basis',
                            type: 'integer',
                            units: ['px', '%', ''],
                            unit: '',
                            defaults: 'auto',
                        }],
                    }, {
                        name: 'Align',
                        property: 'align-self',
                        type: 'radio',
                        defaults: 'auto',
                        list: [{
                            value: 'auto',
                            name: 'Auto',
                        }, {
                            value: 'flex-start',
                            title: 'Start',
                            className: 'icons-flex icon-al-start',
                        }, {
                            value: 'flex-end',
                            title: 'End',
                            className: 'icons-flex icon-al-end',
                        }, {
                            value: 'stretch',
                            title: 'Stretch',
                            className: 'icons-flex icon-al-str',
                        }, {
                            value: 'center',
                            title: 'Center',
                            className: 'icons-flex icon-al-center',
                        }],
                    }]
                }],
            },
            plugins: [
                'gjs-blocks-basic',
                'grapesjs-plugin-forms',
                'grapesjs-component-countdown',
                'grapesjs-plugin-export',
                'grapesjs-tabs',
                'grapesjs-custom-code',
                'grapesjs-touch',
                'grapesjs-parser-postcss',
                'grapesjs-tooltip',
                'grapesjs-tui-image-editor',
                'grapesjs-typed',
                'grapesjs-style-bg',
                'grapesjs-preset-webpage',
                'grapesjs-navbar',
            ],
            pluginsOpts: {
                'gjs-blocks-basic': {
                    flexGrid: true
                },
                'grapesjs-tui-image-editor': {
                    config: {
                        includeUI: {
                            initMenu: 'filter',
                        },
                    },
                },
                'grapesjs-tabs': {
                    tabsBlock: {
                        category: 'Extra'
                    }
                },
                'grapesjs-typed': {
                    block: {
                        category: 'Extra',
                        content: {
                            type: 'typed',
                            'type-speed': 40,
                            strings: [
                                'Text row one',
                                'Text row two',
                                'Text row three',
                            ],
                        }
                    }
                },
                'grapesjs-preset-webpage': {
                    modalImportTitle: 'Import Template',
                    modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
                    modalImportContent: function(editor) {
                        return editor.getHtml() + '<style>' + editor.getCss() + '</style>'
                    },
                },
            },
        });

        // ==== Wiring rail icon + drawer custom (menggantikan sistem panel bawaan GrapesJS) ====
        editor.on('load', () => {

            const drawers = document.querySelectorAll('.editor-drawer');
            const railButtons = document.querySelectorAll('.rail-btn[data-drawer]');
            const actionButtons = document.querySelectorAll('.rail-btn[data-action]');

            // Command yang sifatnya toggle (kalau diklik ulang, jalan lagi = stop)
            const toggleCommands = ['export-template', 'gjs-open-import-webpage', 'core:fullscreen'];
            const activeToggles = new Set();

            function closeAllDrawers() {
                drawers.forEach(d => d.classList.remove('is-open'));
                railButtons.forEach(b => b.classList.remove('is-active'));
                document.body.classList.remove('drawer-open');
            }

            function openDrawer(name) {
                const target = document.getElementById(`drawer-${name}`);
                const btn = document.querySelector(`.rail-btn[data-drawer="${name}"]`);
                const alreadyOpen = target && target.classList.contains('is-open');

                closeAllDrawers();

                if (target && !alreadyOpen) {
                    target.classList.add('is-open');
                    btn && btn.classList.add('is-active');
                    document.body.classList.add('drawer-open');
                }
            }

            railButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    openDrawer(btn.dataset.drawer);
                });
            });

            actionButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const cmd = btn.dataset.action;

                    if (toggleCommands.includes(cmd)) {
                        if (activeToggles.has(cmd)) {
                            editor.stopCommand(cmd);
                            activeToggles.delete(cmd);
                            btn.classList.remove('is-active');
                        } else {
                            editor.runCommand(cmd);
                            activeToggles.add(cmd);
                            btn.classList.add('is-active');
                        }
                    } else {
                        // undo/redo/clear-canvas/open-assets: jalankan langsung, tanpa toggle
                        editor.runCommand(cmd);
                    }
                });
            });

            // ==== Wiring tombol header custom: Preview, Save, Publish ====
            const btnPreview = document.getElementById('btnPreview');
            const btnExitPreview = document.getElementById('btnExitPreview');

            if (btnPreview) {
                btnPreview.addEventListener('click', () => {
                    document.body.classList.add('is-previewing');
                    editor.runCommand('preview'); // sekalian matikan outline komponen
                });
            }

            if (btnExitPreview) {
                btnExitPreview.addEventListener('click', () => {
                    document.body.classList.remove('is-previewing');
                    editor.stopCommand('preview');
                });
            }

            const btnSave = document.getElementById('btnSave');
            if (btnSave) {
                btnSave.addEventListener('click', () => {
                    const originalText = btnSave.textContent;
                    editor.store();
                    btnSave.textContent = 'Tersimpan!';
                    setTimeout(() => { btnSave.textContent = originalText; }, 1500);
                });
            }

            const btnPublish = document.getElementById('btnPublish');
            if (btnPublish) {
                btnPublish.addEventListener('click', async () => {
                    const originalText = btnPublish.textContent;
                    btnPublish.disabled = true;
                    btnPublish.textContent = 'Publishing...';

                    // Simpan dulu isi konten terbaru sebelum ubah status
                    editor.store();

                    try {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                        const response = await fetch('{{ route('pages.update', $page->id) }}', {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: JSON.stringify({
                                title: @json($page->title),
                                short_description: @json($page->short_description),
                                status: 'publish',
                            }),
                        });

                        if (response.ok) {
                            btnPublish.textContent = 'Published!';
                        } else {
                            btnPublish.textContent = 'Gagal, coba lagi';
                            console.error('Publish gagal:', await response.text());
                        }
                    } catch (err) {
                        btnPublish.textContent = 'Gagal, coba lagi';
                        console.error('Publish error:', err);
                    } finally {
                        setTimeout(() => {
                            btnPublish.textContent = originalText;
                            btnPublish.disabled = false;
                        }, 2000);
                    }
                });
            }
        });


        function renderHTML() {
            const PAGE_CONTENTS = [{
                tagName: 'h1',
                type: 'text',
                components: [{
                    type: 'textnode',
                    removable: false,
                    draggable: false,
                    highlightable: 0,
                    copyable: false,
                    selectable: true,
                    content: 'Dit is een test!',
                    _innertext: false,
                }, ],
            }, ]
            const editor = grapesjs.init({
                headless: true
            })
            const components = editor.addComponents(PAGE_CONTENTS)
            const html = components.map(cmp => cmp.toHTML()).join('')
            console.log('Rendered HTML is ', html)
        }

        renderHTML()
    </script>

</body>

</html>
