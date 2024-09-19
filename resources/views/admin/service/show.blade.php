<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usługi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--WIDGET TASK-->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <a href="{{ route('service') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy Usług
                    </a>
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Podgląd usługi
                        </h1>
                    </div>
                    <div class="mt-8">
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Nazwa
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $service->name }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Cena jednostkowa netto
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $service->unit_price ? number_format($service->unit_price, 2) . ' PLN' : '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Stawka VAT
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $service->vat_rate ? number_format($service->vat_rate, 2) . '%' : '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Kwota VAT
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $service->vat_amount ? number_format($service->vat_amount, 2) . ' PLN' : '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Wartość netto
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $service->subtotal ? number_format($service->subtotal, 2) . ' PLN' : '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Wartość brutto
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $service->total ? number_format($service->total, 2) . ' PLN' : '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                Opis
                            </p>
                            <p class="text-gray-900 dark:text-gray-200">
                                {{ $service->description ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 font-semibold">
                                Data utworzenia
                            </p>
                            <p class="text-gray-900 dark:text-gray-400">
                                {{ $service->created_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400 font-semibold">
                                Data aktualizacji
                            </p>
                            <p class="text-gray-900 dark:text-gray-400">
                                {{ $service->updated_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('service.edit', $service) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </a>
                        <form action="{{ route('service.delete', $service) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę usługę?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
</x-app-layout>
