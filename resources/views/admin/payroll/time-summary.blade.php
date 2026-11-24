<dl class="mt-6 grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm">
    @foreach(['nominal' => '📅 Nominalny czas pracy', 'planned' => '🗓️ Zaplanowano w grafiku', 'worked' => '⏱️ Zarejestrowano w RCP', 'extra' => '➕ Czas ponad grafik', 'night' => '🌙 Praca w nocy', 'absence' => '🏖️ Nieobecności wg grafiku'] as $key => $label)
    <div><dt class="text-gray-500 dark:text-gray-400">{{ $label }}</dt><dd class="mt-1 font-medium">{{ $row[$key] === null ? 'Nie dotyczy' : \App\Services\Objects\ObjectWorkReport::duration($row[$key]) }}</dd></div>
    @endforeach
</dl>
