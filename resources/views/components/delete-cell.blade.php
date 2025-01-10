<td class="px-3 py-2">
    <form {{$attributes}}  method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
        @csrf
        @method('DELETE')
        <x-button-red type="submit" class="min-h-[38px]">
            <i class="fa-solid fa-trash"></i>
        </x-button-red>
    </form>
</td>