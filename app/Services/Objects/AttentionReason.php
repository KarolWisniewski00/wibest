<?php

namespace App\Services\Objects;

enum AttentionReason: string
{
    case MissingLocation = 'missing_location';
    case OutsideObjects = 'outside_objects';
    case OutsidePeriod = 'outside_period';
    case InactiveObject = 'inactive_object';
    case UnknownHistory = 'unknown_status_history';
    case AmbiguousObject = 'ambiguous_object';
    case InvalidSession = 'invalid_session';
    case InProgress = 'in_progress';

    public function label(): string
    {
        return match ($this) {
            self::MissingLocation => 'Brak prawidłowej lokalizacji',
            self::OutsideObjects => 'Lokalizacja poza obiektami lub różne miejsca START/STOP',
            self::OutsidePeriod => 'Poza terminem realizacji',
            self::InactiveObject => 'Obiekt nieaktywny przez część lub całość sesji',
            self::UnknownHistory => 'Brak historii statusu dla tego okresu',
            self::AmbiguousObject => 'Pasuje więcej niż jeden obiekt',
            self::InvalidSession => 'Niekompletna lub zablokowana sesja',
            self::InProgress => 'Praca w toku — oczekuje na zakończenie',
        };
    }
}
