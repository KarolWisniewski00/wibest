@props(['blog'])
<tr class="snap-center bg-white dark:bg-gray-800 text-center">

    <td class="px-2 py-2">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$blog->createdBy" />
            <x-user-name :user="$blog->createdBy" />
        </div>
    </td>
        <td class="px-3 py-2">
        <div
            class="text-gray-600 dark:text-gray-300 text-xs tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-center items-center text-center">
            {{ $blog->title }}
        </div>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 bg-green-300">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-dark class="!text-gray-900">
                @if($blog->type == 'spotkanie')
                    👤 {{ $blog->type }}
                @elseif($blog->type == 'telefon')
                    📱 {{ $blog->type }}
                @elseif($blog->type == 'mail')       
                    📧  {{ $blog->type }}
                @elseif($blog->type == 'follow_up') 
                    🔄  {{ $blog->type }}
                @elseif($blog->type == 'inne') 
                    📌  {{ $blog->type }} 
                @elseif($blog->type == 'oferta')
                    🛒 {{ $blog->type }}
                @else
                    {{ $blog->type }}
                @endif
            </x-status-dark>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 min-w-[600px]">
        <div
            class="text-gray-600 dark:text-gray-300 text-xs tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-center items-center text-center">
            {{ Str::limit(json_encode($blog->content, JSON_UNESCAPED_UNICODE), 300) }}
        </div>
    </td>
    <td class="px-3 py-2">
        <x-button-link-blue href="{{ route('setting.blog.edit', $blog) }}" class="min-h-[38px]">
            <i class="fa-solid fa-pen-to-square"></i>
        </x-button-link-blue>
    </td>
</tr>