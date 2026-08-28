<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />

        <!--CONTENT-->
        <x-container-content-form>

            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.crm') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <x-header-form>
                <span>🚀</span> Nowa Aktywność
            </x-header-form>
            <!--POWRÓT-->
            <form id="myForm" method="POST" action="{{ route('setting.crm.store') }}" class="space-y-4">
                @csrf
                <style>
                    @media (prefers-color-scheme: dark) {
                        .ts-dropdown .active {
                            background-color: rgb(75 85 99) !important;
                            color: #fff !important;
                        }

                        .ts-dropdown {
                            border: 1px solid rgb(75 85 99) !important;
                            border-radius: 0.5rem !important;
                        }

                        .option {
                            padding-left: 12px !important;
                        }

                        .ts-control {
                            background-color: rgb(55 65 81) !important;
                            border: 1px solid rgb(75 85 99) !important;
                            border-radius: 0.5rem !important;
                            min-height: 46px !important;
                            color: #fff !important;
                            font-size: 1.125rem !important;
                            line-height: 1.75rem !important;
                            padding-left: 12px !important;
                        }

                        .ts-control input {
                            color: #fff !important;
                            margin: auto 0 !important;
                            font-size: 1.125rem !important;
                            line-height: 1.75rem !important;
                        }

                        .item {
                            margin: auto 0 !important;
                        }
                    }
                </style>
                <div class="mt-2">
                    <label for="company"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🏢</span> Nazwa firmy
                    </label>
                    <select id="company" name="company" autocomplete="off" class="mt-2 rounded-lg text-lg">
                        <option value="">Wybierz firmę</option>
                        @foreach($companies as $company)
                            <option value="{{ $company['id'] }}" data-description="{{ $company['description'] }}">
                                🏢 {{ $company['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-2">
                    <label for="user"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>👤</span> Użytkownik
                    </label>
                    <select id="user" name="user" autocomplete="off" class="mt-2 rounded-lg text-lg">
                        <option value="">Wybierz użytkownika</option>
                    </select>
                </div>

                <script>
                    $(document).ready(function () {
                        // inicjalizacja TomSelect
                        let companySelect = new TomSelect('#company', {
                            maxItems: 1,
                            render: {
                                option: function (data, escape) {
                                    return `
                                    <div class="px-3 py-2 dark:bg-gray-700 dark:text-white">
                                        <div class="text-lg">${escape(data.text)}</div>
                                        <div class="opacity-70 text-xs">${escape(data.description || '')}</div>
                                    </div>
                                `;
                                },
                                item: function (data, escape) {
                                    return `<div>${escape(data.text)}</div>`;
                                }
                            },
                            onChange: function (value) {
                                loadUsers(value);
                            }
                        });

                        let userSelect = new TomSelect('#user', {
                            maxItems: 1,
                            render: {
                                option: function (data, escape) {
                                    // generowanie inicjałów
                                    let initials = data.text
                                        .split(' ')
                                        .filter(w => w.length)
                                        .map(w => w[0].toUpperCase())
                                        .join('+');

                                    let roleClass = '';
                                    let role = '';
                                    console.log(data);
                                    switch (data.role) {
                                        case 'admin': roleClass = 'green'; role = 'admin'; break;
                                        case 'menedżer': roleClass = 'cello'; role = 'menedżer'; break;
                                        case 'kierownik': roleClass = 'yellow'; role = 'kierownik'; break;
                                        case 'użytkownik': roleClass = 'gray'; role = 'użytkownik'; break;
                                        case 'właściciel': roleClass = 'rose'; role = 'właściciel'; break;
                                        case 'CRM': roleClass = 'rose'; role = 'CRM'; break;
                                        default: roleClass = 'violet'; role = 'brak roli';
                                    }

                                    return `
                                    <div class="px-3 py-2 dark:bg-gray-700 dark:text-white">
                                        <div class="flex flex-row gap-2 text-lg">
                                            <img src="https://ui-avatars.com/api/?name=${escape(initials)}&amp;color=7F9CF5&amp;background=EBF4FF" alt="${escape(data.text)}" class="flex-shrink-0 w-10 h-10 rounded-full">
                                            <x-status-gray>
                                                ${escape(data.text)}
                                            </x-status-gray>
                                            <div class="flex items-center gap-2 text-start">
                                                <span class="px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-${roleClass}-300 dark:bg-${roleClass}-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                    ${escape(role)}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                },
                                item: function (data, escape) {
                                    return `<div>${escape(data.text)}</div>`;
                                }
                            }
                        });

                        // funkcja ładowania użytkowników
                        function loadUsers(companyId) {
                            if (!companyId) {
                                userSelect.clearOptions(); // jeśli nie ma firmy, czyść
                                return;
                            }

                            $.ajax({
                                url: `{{ route('api.v1.setting.client.users', '') }}/${companyId}`,
                                method: 'GET',
                                success: function (data) {
                                    userSelect.clear();
                                    // czyścimy stare opcje
                                    userSelect.clearOptions();

                                    // dodajemy nowe
                                    data.forEach(user => {
                                        userSelect.addOption({
                                            value: user.id,
                                            text: user.name,
                                            role: user.role
                                        });
                                    });

                                    // odśwież dropdown
                                    userSelect.refreshOptions(false);
                                },
                                error: function (xhr) {
                                    console.error('Błąd:', xhr.responseText);
                                }
                            });
                        }
                    });
                </script>
                <!--Typ-->
                <div class="mt-2">
                    <div class="mt-2">
                        <label for="type"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                            <span>🏷️</span> Typ
                        </label>
                        <select id="type" name="type" multiple autocomplete="off" placeholder="Wybierz typ"
                            class="mt-2 rounded-lg text-lg">
                            <option value="spotkanie" data-description="Spotkanie z klientem">
                                👤 Spotkanie
                            </option>
                            <option value="telefon" data-description="Rozmowa telefoniczna z klientem">
                                📱 Telefon
                            </option>
                            <option value="mail" data-description="Wiadomość e-mail do klienta">
                                📧 E-mail
                            </option>
                            <option value="oferta" data-description="Przesłanie oferty do klienta">
                                🛒 Oferta
                            </option>
                            <option value="follow_up" data-description="Follow up">
                                🔄 Follow up
                            </option>
                            <option value="inne" data-description="Inne">
                                📌 inne
                            </option>
                        </select>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            new TomSelect('#type', {
                                maxItems: 1,
                                render: {
                                    option: function (data, escape) {
                                        return `
                                        <div class="px-3 py-2 dark:bg-gray-700 dark:text-white">
                                            <div class="text-lg">
                                                ${escape(data.text)}
                                            </div>
                                            <div class="opacity-70 text-xs">
                                                ${escape(data.description || '')}
                                            </div>
                                        </div>
                                    `;
                                    },
                                    item: function (data, escape) {
                                        return `<div>${escape(data.text)}</div>`;
                                    }
                                }
                            });
                        });
                    </script>
                </div>
                <!--Typ-->
                <label for="editor"
                    class="pb-2 block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                    <span>📝</span> Notatka
                </label>
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
                        min-height: 46px !important;
                    }

                    .ql-editor {
                        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                        padding: 8px 12px !important;
                        font-size: 1.125rem !important;
                        line-height: 1.75rem !important;
                        min-height: 46px !important;
                    }

                    @media (prefers-color-scheme: dark) {
                        .ql-toolbar {
                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                        }

                        .ql-editor {
                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                        }

                        .ql-editor.ql-blank::before {
                            color: #9ca3af;
                            /* Tailwind gray-400 */
                        }

                        .ql-toolbar {
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
                    document.getElementById('myForm').onsubmit = function () {
                        var editorContent = document.getElementById('editor-content');
                        editorContent.value = quill.root.innerHTML;
                    };
                </script>
                <div class="mb-6">
                    <label for="datetime_start" class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅
                        Data rozpoczęcia</label>
                    <input type="text" id="datetime_start" name="datetime_start" placeholder="DD.MM.YYYY HH:MM" required
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                    @error('datetime_start')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="datetime_end" class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅 Data
                        zakończenia</label>
                    <input type="text" id="datetime_end" name="datetime_end" placeholder="DD.MM.YYYY HH:MM" required
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                    @error('datetime_end')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <script>
                    let startPicker;
                    let endPicker;

                    document.addEventListener('DOMContentLoaded', function () {

                        startPicker = flatpickr("#datetime_start", {
                            enableTime: true,
                            dateFormat: "d.m.Y H:i",
                            time_24hr: true,

                            onChange: function (selectedDates) {
                                if (!selectedDates.length) return;

                                let startDate = selectedDates[0];

                                // 🔥 +1 godzina
                                let endDate = new Date(startDate.getTime() + 60 * 60 * 1000);

                                // ustaw w drugim pickerze
                                endPicker.setDate(endDate);
                            }
                        });

                        endPicker = flatpickr("#datetime_end", {
                            enableTime: true,
                            dateFormat: "d.m.Y H:i",
                            time_24hr: true
                        });

                    });
                </script>

                <div class="mt-2 flex flex-col">
                    <label for="company"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>✅</span> Czy już realizowane?
                    </label>
                    <!-- Resetuj urlopy planowane -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="already_realized" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Zrealizowane
                        </span>
                    </label>
                    <label for="company"
                        class=" mt-2 block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>❗</span> Czy pilne?
                    </label>
                    <!-- Resetuj urlopy planowane -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" name="important" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Pilne
                        </span>
                    </label>
                </div>
                <div class="flex justify-end mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>
            </form>
        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
</x-app-layout>