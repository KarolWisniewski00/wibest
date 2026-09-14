@props(['crm'])
<tr class="snap-center bg-white dark:bg-gray-800 text-center">

    <td class="px-2 py-2 text-start max-w-[250px]">
        <x-paragraf-display class="text-xs break-words whitespace-normal">
            <x-status-gray>
                @if($crm->company)
                    <span>🏢</span> {{ $crm->company->name }}
                @endif
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <td class="px-2 py-2">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$crm->user" />
            <x-user-name :user="$crm->user" />
        </div>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50
    @if($crm->datetime_complete != null)
        bg-green-300
    @else
        bg-gray-300
    @endif
    ">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-dark class="!text-gray-900">
                @if($crm->type == 'spotkanie')
                    👤 {{ $crm->type }}
                @elseif($crm->type == 'telefon')
                    📱 {{ $crm->type }}
                @elseif($crm->type == 'mail')
                    📧 {{ $crm->type }}
                @elseif($crm->type == 'follow_up')
                    🔄 {{ $crm->type }}
                @elseif($crm->type == 'inne')
                    📌 {{ $crm->type }}
                @elseif($crm->type == 'oferta')
                    🛒 {{ $crm->type }}
                @else
                    {{ $crm->type }}
                @endif
            </x-status-dark>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 min-w-[600px]">
        <div id="crm-notes-{{ $crm->id }}" class="crm-notes">

            <div
                class="crm-notes-content text-gray-600 dark:text-gray-300 text-md tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 flex flex-col items-start text-start overflow-hidden">
                {!! $crm->notes !!}
            </div>

            <button type="button"
                class="crm-notes-button hidden mt-2 text-green-600 dark:text-green-300 hover:text-green-700 dark:hover:text-green-200 font-semibold text-sm tracking-normal">
                Pokaż więcej
            </button>

        </div>

        <script>
            $(function () {

                const container = $('#crm-notes-{{ $crm->id }}');
                const content = container.find('.crm-notes-content');
                const button = container.find('.crm-notes-button');
                const element = content[0];

                if (!element) {
                    return;
                }

                // Wysokość jednej linii
                const lineHeight = parseFloat(
                    window.getComputedStyle(element).lineHeight
                );

                // Liczba linii
                const lines = Math.round(
                    element.scrollHeight / lineHeight
                );

                // Jeżeli jest minimum 5 linii
                if (lines >= 5) {

                    // Pokazujemy tylko 4 linie
                    content.css(
                        'max-height',
                        `${lineHeight * 4}px`
                    );

                    button.removeClass('hidden');

                    button.on('click', function () {

                        const expanded = content.hasClass('expanded');

                        if (expanded) {

                            content
                                .removeClass('expanded')
                                .css(
                                    'max-height',
                                    `${lineHeight * 4}px`
                                );

                            button.text('Pokaż więcej');

                        } else {

                            content
                                .addClass('expanded')
                                .css('max-height', 'none');

                            button.text('Pokaż mniej');
                        }
                    });
                }
            });
        </script>
    </td>
    <td class="px-3 py-2">
        <x-button-link-blue href="{{ route('setting.crm.edit', $crm) }}" class="min-h-[38px]">
            <i class="fa-solid fa-pen-to-square"></i>
        </x-button-link-blue>
    </td>
</tr>