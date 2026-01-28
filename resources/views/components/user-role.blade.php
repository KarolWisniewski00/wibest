@if($user->role == 'admin')
<x-label-green>
    Admin
</x-label-green>
@elseif($user->role == 'menedżer')
<x-label-cello>
    Menedżer
</x-label-cello>
@elseif($user->role == 'kierownik')
<x-label-yellow>
    Kierownik
</x-label-yellow>
@elseif($user->role == 'użytkownik')
<x-label-gray>
    Użytkownik
</x-label-gray>
@elseif($user->role == 'właściciel')
<x-label-rose>
    Właściciel
</x-label-rose>
@else
<x-label-violet>
    Brak Roli
</x-label-violet>
@endif