<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;

class UsersStep extends Step
{
    protected string $view = 'livewire.steps.users-step';

    /**
     * Ładuje stan kroku, teraz dla tablicy identyfikatorów.
     */
    public function mount()
    {
        // Zakładamy, że model->user_ids jest tablicą identyfikatorów użytkowników
        $this->mergeState([
            // Używamy operatora ?? [] aby upewnić się, że zawsze jest to tablica, nawet jeśli jest pusta/null
            'user_ids' => $this->model->user_ids ?? [],
        ]);
    }

    /**
     * Zapisuje stan do modelu.
     */
    public function save($state)
    {
        // Zapisujemy całą tablicę identyfikatorów
        $this->model->user_ids = $state['user_ids'];
    }

    public function icon(): string
    {
        return 'user';
    }

    /**
     * Walidacja stanu. Wymaga, aby 'user_ids' było tablicą i zawierało co najmniej jeden element.
     */
    public function validate()
    {
        return [
            [
                // Wymaga, aby była to tablica i miała co najmniej jeden element
                'state.user_ids'      => ['required', 'array', 'min:1'],
            ],
            [], // Pusta tablica dla atrybutów (niezmieniona)
            [
                'state.user_ids'      => __('user_ids'),
            ],
        ];
    }

    public function title(): string
    {
        // Zmieniony tytuł dla lepszego kontekstu
        return __('👤 Wybierz użytkowników');
    }

}