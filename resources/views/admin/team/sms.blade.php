<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                konfiguracja smsów użytkownika.
            </div>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-team.nav :role="$role" :invitations="$invitations" />

        <!--CONTENT-->
        <div class="p-4">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('team.user.show', $user) }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do profilu
            </x-button-link-back>
            <!--POWRÓT-->
            <form method="POST" action="{{ route('team.user.update_sms', $user) }}">
                @csrf
                @method('PUT')
                <div class="" id="sms-settings">
                    <h2 class="text-xl font-semibold dark:text-white mb-4 flex items-center gap-2">
                        📱 Ustawienia SMS
                    </h2>

                    <div class="bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl  p-5 space-y-6">

                        <!-- 1️⃣ Włączanie nadgodzin -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Powiadomienia SMS</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Włącz, jeśli chcesz, aby system wysyłał powiadomienia SMS.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-solid fa-comment-sms text-green-400 mr-2"></i>
                                    System uwzględni powiadomienia SMS przy wnioskach i odczytach pracy.
                                </div>
                            </div>
                            <label class="inline-flex items-center md:justify-center md:w-48">
                                <input type="checkbox" class="sr-only peer"
                                    name="sms"
                                    @if($user->sms) checked @endif
                                >
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                            </label>
                        </div>
                    </div>
                </div>
                <!--ZAPISZ-->
                <div class="flex justify-end mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>
                <!--ZAPISZ-->
            </form>
        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>