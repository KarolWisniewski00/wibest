<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                Edytujesz notatkę do elementu RCP
            </div>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-RCP.nav :countEvents="$countEvents"/>
        <!--CONTENT-->
        <div class="p-4">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('rcp.work-session.show', $work_session) }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-50 mb-4 text-center">Edycja notatki RCP</h2>
            <!--POWRÓT-->
            <form id="myForm" method="POST" action="{{ route('rcp.work-session.update.note', $work_session) }}" class="space-y-4">
                @csrf
                @method('PUT')
                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
                <style>
                    #editor {
                        border: 0;
                    }

                    .ql-toolbar {
                        border: 0 !important;
                        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                        border-radius: 0.375rem;
                        overflow-y: auto;
                        padding: 8px 12px !important;
                        margin: 0 !important;
                    }

                    .ql-editor {
                        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                        padding: 8px 12px !important;
                    }

                    @media (prefers-color-scheme: dark) {
                        .ql-toolbar {
                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                        }

                        .ql-editor {
                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                        }

                        .ql-italic .ql-stroke {
                            stroke: white !important;
                        }

                        .ql-underline .ql-stroke {
                            stroke: white !important;
                        }

                        .ql-bold .ql-stroke {
                            stroke: white !important;
                        }

                        .ql-fill {
                            fill: white !important;
                        }

                        .ql-italic:hover .ql-stroke {
                            stroke: #9ca3af !important;
                        }

                        .ql-underline:hover .ql-stroke {
                            stroke: #9ca3af !important;
                        }

                        .ql-bold:hover .ql-stroke {
                            stroke: #9ca3af !important;
                        }

                        .ql-underline:hover .ql-fill {
                            fill: #9ca3af !important;
                        }
                    }
                </style>
                <div id="editor" class="bg-white dark:bg-gray-700 dark:text-white rounded-md h-64 overflow-y-auto">
                    {!! $work_session->notes !!}
                </div>

                <textarea id="editor-content" name="content" style="display:none;"></textarea>
                <script>
                    const quill = new Quill('#editor', {
                        theme: 'snow',
                        placeholder: '👈 Wpisz tutaj treść...',
                        modules: {
                            toolbar: [
                                ['bold', 'italic', 'underline'],
                            ]
                        }
                    });
                    // Synchronizuj zawartość edytora z ukrytym polem tekstowym
                    document.getElementById('myForm').onsubmit = function() {
                        var editorContent = document.getElementById('editor-content');
                        editorContent.value = quill.root.innerHTML;
                    };
                </script>
                <div class="flex justify-end mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>
            </form>
        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>