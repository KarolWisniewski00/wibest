<?php

return [

    'accepted' => 'Pole :attribute musi zostać zaakceptowane.',
    'accepted_if' => 'Pole :attribute musi zostać zaakceptowane, gdy :other ma wartość :value.',
    'active_url' => 'Pole :attribute musi być poprawnym adresem URL.',
    'after' => 'Pole :attribute musi zawierać datę późniejszą niż :date.',
    'after_or_equal' => 'Pole :attribute musi zawierać datę późniejszą lub równą :date.',
    'alpha' => 'Pole :attribute może zawierać wyłącznie litery.',
    'alpha_dash' => 'Pole :attribute może zawierać wyłącznie litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => 'Pole :attribute może zawierać wyłącznie litery i cyfry.',
    'array' => 'Pole :attribute musi być tablicą.',
    'ascii' => 'Pole :attribute może zawierać wyłącznie jednobajtowe znaki alfanumeryczne i symbole.',
    'before' => 'Pole :attribute musi zawierać datę wcześniejszą niż :date.',
    'before_or_equal' => 'Pole :attribute musi zawierać datę wcześniejszą lub równą :date.',

    'between' => [
        'array' => 'Pole :attribute musi zawierać od :min do :max elementów.',
        'file' => 'Pole :attribute musi mieć rozmiar od :min do :max KB.',
        'numeric' => 'Wartość pola :attribute musi mieścić się w przedziale od :min do :max.',
        'string' => 'Pole :attribute musi zawierać od :min do :max znaków.',
    ],

    'boolean' => 'Pole :attribute musi mieć wartość prawda albo fałsz.',
    'can' => 'Pole :attribute zawiera niedozwoloną wartość.',
    'confirmed' => 'Potwierdzenie pola :attribute nie jest zgodne.',
    'current_password' => 'Podane hasło jest nieprawidłowe.',
    'date' => 'Pole :attribute musi być poprawną datą.',
    'date_equals' => 'Pole :attribute musi zawierać datę równą :date.',
    'date_format' => 'Pole :attribute musi być zgodne z formatem :format.',
    'decimal' => 'Pole :attribute musi zawierać :decimal miejsc po przecinku.',
    'declined' => 'Pole :attribute musi zostać odrzucone.',
    'declined_if' => 'Pole :attribute musi zostać odrzucone, gdy :other ma wartość :value.',
    'different' => 'Pole :attribute i :other muszą się różnić.',
    'digits' => 'Pole :attribute musi składać się z :digits cyfr.',
    'digits_between' => 'Pole :attribute musi zawierać od :min do :max cyfr.',
    'dimensions' => 'Pole :attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole :attribute zawiera duplikat wartości.',
    'doesnt_end_with' => 'Pole :attribute nie może kończyć się żadną z wartości: :values.',
    'doesnt_start_with' => 'Pole :attribute nie może zaczynać się żadną z wartości: :values.',
    'email' => 'Pole :attribute musi być poprawnym adresem e-mail.',
    'ends_with' => 'Pole :attribute musi kończyć się jedną z wartości: :values.',
    'enum' => 'Wybrana wartość pola :attribute jest nieprawidłowa.',
    'exists' => 'Wybrana wartość pola :attribute jest nieprawidłowa.',
    'extensions' => 'Pole :attribute musi mieć jedno z następujących rozszerzeń: :values.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi posiadać wartość.',

    'gt' => [
        'array' => 'Pole :attribute musi zawierać więcej niż :value elementów.',
        'file' => 'Pole :attribute musi być większe niż :value KB.',
        'numeric' => 'Pole :attribute musi być większe niż :value.',
        'string' => 'Pole :attribute musi zawierać więcej niż :value znaków.',
    ],

    'gte' => [
        'array' => 'Pole :attribute musi zawierać co najmniej :value elementów.',
        'file' => 'Pole :attribute musi być większe lub równe :value KB.',
        'numeric' => 'Pole :attribute musi być większe lub równe :value.',
        'string' => 'Pole :attribute musi zawierać co najmniej :value znaków.',
    ],

    'hex_color' => 'Pole :attribute musi być poprawnym kolorem szesnastkowym.',
    'image' => 'Pole :attribute musi być obrazem.',
    'in' => 'Wybrana wartość pola :attribute jest nieprawidłowa.',
    'in_array' => 'Pole :attribute musi występować w :other.',
    'integer' => 'Pole :attribute musi być liczbą całkowitą.',
    'ip' => 'Pole :attribute musi być poprawnym adresem IP.',
    'ipv4' => 'Pole :attribute musi być poprawnym adresem IPv4.',
    'ipv6' => 'Pole :attribute musi być poprawnym adresem IPv6.',
    'json' => 'Pole :attribute musi być poprawnym ciągiem JSON.',
    'lowercase' => 'Pole :attribute musi zawierać wyłącznie małe litery.',

    'lt' => [
        'array' => 'Pole :attribute musi zawierać mniej niż :value elementów.',
        'file' => 'Pole :attribute musi być mniejsze niż :value KB.',
        'numeric' => 'Pole :attribute musi być mniejsze niż :value.',
        'string' => 'Pole :attribute musi zawierać mniej niż :value znaków.',
    ],

    'lte' => [
        'array' => 'Pole :attribute nie może zawierać więcej niż :value elementów.',
        'file' => 'Pole :attribute musi być mniejsze lub równe :value KB.',
        'numeric' => 'Pole :attribute musi być mniejsze lub równe :value.',
        'string' => 'Pole :attribute musi zawierać maksymalnie :value znaków.',
    ],

    'mac_address' => 'Pole :attribute musi być poprawnym adresem MAC.',

    'max' => [
        'array' => 'Pole :attribute nie może zawierać więcej niż :max elementów.',
        'file' => 'Pole :attribute nie może być większe niż :max KB.',
        'numeric' => 'Pole :attribute nie może być większe niż :max.',
        'string' => 'Pole :attribute nie może zawierać więcej niż :max znaków.',
    ],

    'max_digits' => 'Pole :attribute nie może zawierać więcej niż :max cyfr.',
    'mimes' => 'Pole :attribute musi być plikiem typu: :values.',
    'mimetypes' => 'Pole :attribute musi być plikiem typu: :values.',

    'min' => [
        'array' => 'Pole :attribute musi zawierać co najmniej :min elementów.',
        'file' => 'Pole :attribute musi mieć co najmniej :min KB.',
        'numeric' => 'Pole :attribute musi być nie mniejsze niż :min.',
        'string' => 'Pole :attribute musi zawierać co najmniej :min znaków.',
    ],

    'min_digits' => 'Pole :attribute musi zawierać co najmniej :min cyfr.',
    'missing' => 'Pole :attribute musi być nieobecne.',
    'missing_if' => 'Pole :attribute musi być nieobecne, gdy :other ma wartość :value.',
    'missing_unless' => 'Pole :attribute musi być nieobecne, chyba że :other ma wartość :value.',
    'missing_with' => 'Pole :attribute musi być nieobecne, gdy występuje :values.',
    'missing_with_all' => 'Pole :attribute musi być nieobecne, gdy występują wszystkie pola: :values.',
    'multiple_of' => 'Pole :attribute musi być wielokrotnością liczby :value.',
    'not_in' => 'Wybrana wartość pola :attribute jest nieprawidłowa.',
    'not_regex' => 'Format pola :attribute jest nieprawidłowy.',
    'numeric' => 'Pole :attribute musi być liczbą.',

    'password' => [
        'letters' => 'Pole :attribute musi zawierać przynajmniej jedną literę.',
        'mixed' => 'Pole :attribute musi zawierać przynajmniej jedną wielką i jedną małą literę.',
        'numbers' => 'Pole :attribute musi zawierać przynajmniej jedną cyfrę.',
        'symbols' => 'Pole :attribute musi zawierać przynajmniej jeden znak specjalny.',
        'uncompromised' => 'To :attribute wystąpiło w wycieku danych. Wybierz inne.',
    ],

    'present' => 'Pole :attribute musi być obecne.',
    'present_if' => 'Pole :attribute musi być obecne, gdy :other ma wartość :value.',
    'present_unless' => 'Pole :attribute musi być obecne, chyba że :other ma wartość :value.',
    'present_with' => 'Pole :attribute musi być obecne, gdy występuje :values.',
    'present_with_all' => 'Pole :attribute musi być obecne, gdy występują pola: :values.',

    'prohibited' => 'Pole :attribute jest niedozwolone.',
    'prohibited_if' => 'Pole :attribute jest niedozwolone, gdy :other ma wartość :value.',
    'prohibited_unless' => 'Pole :attribute jest niedozwolone, chyba że :other znajduje się wśród :values.',
    'prohibits' => 'Pole :attribute uniemożliwia obecność pola :other.',

    'regex' => 'Format pola :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_array_keys' => 'Pole :attribute musi zawierać klucze: :values.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :other ma wartość :value.',
    'required_if_accepted' => 'Pole :attribute jest wymagane, gdy :other zostało zaakceptowane.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other znajduje się wśród :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy występuje :values.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy występują pola: :values.',
    'required_without' => 'Pole :attribute jest wymagane, gdy :values nie występuje.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy żadne z pól :values nie występuje.',

    'same' => 'Pole :attribute musi być takie samo jak :other.',

    'size' => [
        'array' => 'Pole :attribute musi zawierać :size elementów.',
        'file' => 'Pole :attribute musi mieć dokładnie :size KB.',
        'numeric' => 'Pole :attribute musi mieć wartość :size.',
        'string' => 'Pole :attribute musi zawierać dokładnie :size znaków.',
    ],

    'starts_with' => 'Pole :attribute musi zaczynać się jedną z wartości: :values.',
    'string' => 'Pole :attribute musi być ciągiem znaków.',
    'timezone' => 'Pole :attribute musi być poprawną strefą czasową.',
    'unique' => 'Podana wartość pola :attribute jest już zajęta.',
    'uploaded' => 'Nie udało się przesłać pliku :attribute.',
    'uppercase' => 'Pole :attribute musi zawierać wyłącznie wielkie litery.',
    'url' => 'Pole :attribute musi być poprawnym adresem URL.',
    'ulid' => 'Pole :attribute musi być poprawnym identyfikatorem ULID.',
    'uuid' => 'Pole :attribute musi być poprawnym identyfikatorem UUID.',

    'custom' => [],

    'attributes' => [
        'name' => 'nazwa',
        'email' => 'adres e-mail',
        'password' => 'hasło',
        'password_confirmation' => 'potwierdzenie hasła',
        'current_password' => 'aktualne hasło',
    ],

];