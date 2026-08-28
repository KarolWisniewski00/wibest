@props(['crm'])
<tr class="snap-center bg-white dark:bg-gray-800 text-center">

    <td class="px-2 py-2 text-start">
        <x-paragraf-display class=" text-xs whitespace-nowrap">
            <x-status-gray>
                @if($crm->company)<span>🏢</span> {{ $crm->company->name }} @endif
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
                    📧  {{ $crm->type }}
                @elseif($crm->type == 'follow_up') 
                    🔄  {{ $crm->type }}
                @elseif($crm->type == 'inne') 
                    📌  {{ $crm->type }} 
                @elseif($crm->type == 'oferta')
                    🛒 {{ $crm->type }}
                @else
                    {{ $crm->type }}
                @endif
            </x-status-dark>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 min-w-[600px]">
        <div
            class="text-gray-600 dark:text-gray-300 text-xs tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-center items-center text-center">
            {!! $crm->notes !!}
        </div>
    </td>
    <td class="px-3 py-2">
        <x-button-link-blue href="{{ route('setting.crm.edit', $crm) }}" class="min-h-[38px]">
            <i class="fa-solid fa-pen-to-square"></i>
        </x-button-link-blue>
    </td>
</tr>