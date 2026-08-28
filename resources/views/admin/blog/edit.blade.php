<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />

        <!--CONTENT-->
        <x-container-content-form>

            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.blog') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <x-header-form>
                <span>📈</span> Blog
            </x-header-form>
            <!--POWRÓT-->
            <form id="myForm" method="POST" action="{{ route('setting.blog.update', $blog) }}" class="space-y-4">
                @csrf
                @method('PUT')
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
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        📝 Tytuł
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}"
                        placeholder="Wpisz tytuł artykułu" required
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        🔗 Slug
                    </label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $blog->slug) }}"
                        placeholder="np. nowa-aktualizacja-systemu" required
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">

                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="short_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        📄 Krótki opis
                    </label>

                    <textarea id="short_description" name="short_description" rows="4"
                        placeholder="Krótki opis artykułu wyświetlany na liście wpisów..."
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('short_description', $blog->short_description) }}</textarea>

                    @error('short_description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <x-header-form>
                    <span>🔍</span> SEO
                </x-header-form>

                <div class="mb-6">
                    <label for="seo_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        🏷️ SEO Title
                    </label>

                    <input type="text" id="seo_title" name="seo_title" value="{{ old('seo_title', $blog->seo_title) }}"
                        placeholder="Tytuł SEO"
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                    @error('seo_title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="seo_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        📝 SEO Description
                    </label>

                    <textarea id="seo_description" name="seo_description" rows="4" placeholder="Opis dla Google..."
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('seo_description', $blog->seo_description) }}</textarea>
                    @error('seo_description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="seo_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        🔑 SEO Keywords
                    </label>

                    <input type="text" id="seo_keywords" name="seo_keywords"
                        value="{{ old('seo_keywords', $blog->seo_keywords) }}"
                        placeholder="laravel, cms, blog, aktualizacja"
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                    @error('seo_keywords')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {

                        const titleInput = document.getElementById('title');
                        const slugInput = document.getElementById('slug');

                        let slugEditedManually = false;

                        slugInput.addEventListener('input', () => {
                            slugEditedManually = true;
                        });

                        titleInput.addEventListener('input', () => {

                            if (slugEditedManually) {
                                return;
                            }

                            let slug = titleInput.value
                                .toLowerCase()
                                .normalize("NFD")
                                .replace(/[\u0300-\u036f]/g, "") // polskie znaki
                                .replace(/[^a-z0-9\s-]/g, "")
                                .trim()
                                .replace(/\s+/g, '-')
                                .replace(/-+/g, '-');

                            slugInput.value = slug;
                        });

                        const title = document.getElementById('title');
                        const description = document.getElementById('short_description');

                        const seoTitle = document.getElementById('seo_title');
                        const seoDescription = document.getElementById('seo_description');

                        let seoTitleEdited = false;
                        let seoDescriptionEdited = false;

                        seoTitle.addEventListener('input', () => seoTitleEdited = true);
                        seoDescription.addEventListener('input', () => seoDescriptionEdited = true);

                        title.addEventListener('input', () => {
                            if (!seoTitleEdited) {
                                seoTitle.value = title.value;
                            }
                        });

                        description.addEventListener('input', () => {
                            if (!seoDescriptionEdited) {
                                seoDescription.value = description.value;
                            }
                        });
                    });
                </script>
                <div class="mt-2">
                    <label for="type"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🏷️</span> Typ
                    </label>
                    <select id="type" name="type" autocomplete="off" class="mt-2 rounded-lg text-lg">

                        <option value="">Wybierz typ</option>

                        <option value="Wpis" {{ old('type', $blog->type) === 'Wpis' ? 'selected' : '' }}>
                            Wpis
                        </option>

                        <option value="Aktualizacja" {{ old('type', $blog->type) === 'Aktualizacja' ? 'selected' : '' }}>
                            Aktualizacja
                        </option>

                        <option value="Regulamin" {{ old('type', $blog->type) === 'Regulamin' ? 'selected' : '' }}>
                            Regulamin
                        </option>

                        <option value="Polityka prywatności" {{ old('type', $blog->type) === 'Polityka prywatności' ? 'selected' : '' }}>
                            Polityka prywatności
                        </option>

                        <option value="Polityka cookies" {{ old('type', $blog->type) === 'Polityka cookies' ? 'selected' : '' }}>
                            Polityka cookies
                        </option>

                    </select>

                    @error('type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
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
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- EDYTOR --}}
                    <div class="mt-2">
                        <input type="hidden" name="content" id="content-json">

                        <div class="flex gap-2 mb-4">
                            <x-button-neutral type="button" onclick="addBlock('text')">+ Tekst</x-button-neutral>
                            <x-button-neutral type="button" onclick="addBlock('heading')">+ Nagłówek</x-button-neutral>
                            <x-button-neutral type="button" onclick="addBlock('blade_component')">+
                                Komponent</x-button-neutral>
                            <x-button-neutral type="button" onclick="addBlock('html')">+ HTML</x-button-neutral>
                        </div>

                        <div id="blocks" class="space-y-3"></div>
                    </div>

                    {{-- PODGLĄD --}}
                    <div>
                        <label
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                            Podgląd
                        </label>
                        <div
                            class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                            <div id="preview" style='font-family: "Lato", sans-serif;'
                                class="flex flex-col items-start justify-between gap-4 mb-8">
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    @php
                        $oldContent = old('content');

                        if ($oldContent) {
                            $blocks = is_string($oldContent)
                                ? json_decode($oldContent, true)
                                : $oldContent;
                        } else {
                            $blocks = $blog->content ?? [];
                        }

                        if (!is_array($blocks)) {
                            $blocks = [];
                        }
                    @endphp

                    let blocks = @json($blocks);
                </script>
                <script>

                    function uid() {
                        return Math.random().toString(36).substr(2, 9);
                    }
                    function addBlock(type) {
                        const block = {
                            id: uid(),
                            type: type,
                            data: {}
                        };

                        if (type === 'text') {
                            block.data.content = '';
                        }

                        if (type === 'heading') {
                            block.data.text = '';
                        }

                        if (type === 'blade_component') {
                            block.data.name = '';
                            block.data.props = {};
                        }
                        if (type === 'html') {
                            block.data.html = '';
                        }

                        blocks.push(block);

                        render();
                        sync();
                    }
                    function render() {
                        const container = document.getElementById('blocks');
                        container.innerHTML = '';

                        blocks.forEach((block, index) => {

                            let html = '';

                            if (block.type === 'text') {
                                html = `
                            <div class="w-full">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span>💬</span> Tekst
                                </label>
                                <textarea placeholder="Tekst..." oninput="updateBlock('${block.id}', 'content', this.value)"
                                    class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-300">${block.data.content}</textarea>
                            </div>
                            `;
                            }

                            if (block.type === 'heading') {
                                html = `
                            <div class="w-full">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span>💬</span> Nagłówek
                                </label>
                                <textarea placeholder="Nagłówek..." oninput="updateBlock('${block.id}', 'text', this.value)"
                                    class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-300">${block.data.text}</textarea>
                            </div>
                            `;
                            }

                            if (block.type === 'blade_component') {
                                html = `
                            <div class="w-full">
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span></span> Nazwa komponentu
                                </label>
                                <input type="text" value="${block.data.name || ''}" oninput="updateComponentName('${block.id}', this.value)" placeholder="Nazwa komponentu"
                                    class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                            </div>
                            `;
                            }
                            if (block.type === 'html') {
                                html = `
                                <div class="w-full">
                                    <label class="block text-sm font-medium">
                                        HTML
                                    </label>

                                    <textarea
                                        oninput="updateBlock('${block.id}','html',this.value)"
                                        class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-700"
                                    >${block.data.html || ''}</textarea>
                                </div>
                            `;
                            }

                            container.innerHTML += `
                            <div
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 dark:text-gray-200 dark:bg-gray-800 transition-all duration-200">
                                <div class="flex flex-col items-center justify-center w-full gap-2">
                                    ${html}
                                    <x-button-red class="w-full" type="button" onclick="removeBlock('${block.id}')">
                                        <i class="fa-solid fa-trash mr-2" aria-hidden="true"></i>Usuń
                                    </x-button-red>
                                </div>
                            </div>
        `;
                        });
                    }
                    function updateBlock(id, key, value) {
                        const block = blocks.find(b => b.id === id);

                        if (!block) return;

                        block.data[key] = value;

                        sync();
                    }
                    function updateComponentName(id, value) {
                        const block = blocks.find(b => b.id === id);
                        if (!block) return;

                        block.data.name = value;

                        sync();
                    }
                    function removeBlock(id) {
                        blocks = blocks.filter(b => b.id !== id);
                        render();
                        sync();
                    }
                    function sync() {
                        document.getElementById('content-json').value =
                            JSON.stringify(blocks);

                        renderPreview();
                    }
                    function renderPreview() {
                        const preview = document.getElementById('preview');

                        let html = '';

                        blocks.forEach(block => {

                            if (block.type === 'text') {
                                html += `<p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">${block.data.content || ''}</p>`;
                            }

                            if (block.type === 'heading') {
                                html += `<h3 style='font-weight: 900;' class="text-3xl font-black text-gray-900 dark:text-white leading-tight">${block.data.text || ''}</h3>`;
                            }

                            if (block.type === 'blade_component') {
                                switch (block.data.name) {
                                    case "RCP":
                                        html += `
                                    <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                        <span class="text-lg md:text-xl">⏱️</span>
                                        <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                            RCP
                                        </span>
                                    </div>
                                    `;
                                        break;
                                    default:
                                        html += `<div class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                            [COMPONENT: ${block.data.name || 'brak'}]
                                        </div>`;
                                }
                            }
                            if (block.type === 'html') {
                                html += block.data.html || '';
                            }
                        });

                        preview.innerHTML = html;

                    }
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        render();
                        sync();
                    });
                </script>

                <div class="flex justify-end mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>
            </form>
            <!--USUŃ-->
            <form action="{{ route('setting.blog.delete', $blog) }}" method="POST" class="w-full md:w-fit"
                onsubmit="return confirm('Czy na pewno chcesz usunąć ten wpis?');">

                @csrf
                @method('DELETE')

                <x-button-red type="submit" class="text-lg w-full md:w-fit">
                    <i class="fa-solid fa-trash mr-2"></i>Usuń
                </x-button-red>
            </form>
            <!--USUŃ-->
        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
</x-app-layout>