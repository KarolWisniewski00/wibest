<?php

return [
    // Add a new dated version; never replace an archived snapshot's parameters.
    'versions' => [
        '2026-01-01' => [
            'id' => 'PL-2026-v1', 'until' => '2026-12-31', 'tax_year' => 2026,
            'minimum_monthly' => 4806, 'minimum_hourly_mandate' => 31.40,
            'night_bonus' => 0.20, 'night_bonus_bp' => 2000, 'overtime_50' => 0.50, 'overtime_100' => 1.00,
            'employer_pension' => 0.0976, 'employer_disability' => 0.065,
            'fp_fs' => 0.0245, 'fgsp' => 0.001, 'annual_pension_cap' => 282600,
            'ppk_employer_min_percent' => 1.5, 'ppk_employer_max_percent' => 4,
            // No default accident contribution / PPK / exemptions: individual data required.
            'sources' => [
                'https://eli.gov.pl/eli/DU/2025/1242/ogl',
                'https://eli.gov.pl/eli/MP/2025/1206/ogl',
                'https://www.gov.pl/web/rodzina/praca-nadliczbowa',
                'https://isap.sejm.gov.pl/isap.nsf/download.xsp/WDU20250000277/U/D20250277Lj.pdf',
                'https://www.zus.pl/baza-wiedzy/skladki-wskazniki-odsetki/skladki/wysokosc-skladek-na-ubezpieczenia-spoleczne',
                'https://www.gov.pl/web/finanse/ppk-pracownicze-plany-kapitalowe',
                'https://biznes.gov.pl/pl/portal/00274',
                'https://www.zus.pl/documents/10182/167567/Poradnik_umowy_cywilnoprawne/',
            ],
        ],
    ],
];
