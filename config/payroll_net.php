<?php

return [
    // Monetary values in grosz, rates in basis points. No fallback to another tax year.
    '2026' => [
        'version' => 'PL-UOP-2026-net-v2', 'from' => '2026-01-01', 'until' => '2026-12-31',
        'exemption_limit' => 8552800, 'ppk_reduced_monthly_limit' => 576720,
        'pension_bp' => 976, 'disability_bp' => 150, 'sickness_bp' => 245, 'health_bp' => 900,
        'pension_cap' => 28260000, 'pit_threshold' => 12000000, 'pit_low_bp' => 1200, 'pit_high_bp' => 3200,
        'kup_options' => [0, 25000, 30000], 'pit_reductions' => [0, 10000, 15000, 30000],
        'health_legacy_threshold' => 8552800, 'health_legacy_low_bp' => 1700, 'health_legacy_high_bp' => 3200,
        'health_legacy_reductions' => [0, 4376],
        'ppk_employee_min_bp' => 200, 'ppk_employee_max_bp' => 400,
        'ppk_employer_min_bp' => 150, 'ppk_employer_max_bp' => 400,
        'employer_pension_bp' => 976, 'employer_disability_bp' => 650, 'fp_fs_bp' => 245, 'fgsp_bp' => 10,
        'sources' => [
            'https://podatki.gov.pl/ulgi-i-odliczenia/ulga-dla-mlodych-pit',
            'https://podatki.gov.pl/ulgi-i-odliczenia/odliczenie-skladek-na-ubezpieczenie-spoleczne-pit',
            'https://www.mojeppk.pl/faq.html',
            'https://eli.gov.pl/api/acts/DU/2026/592/text/I/D20260592.pdf',
            'https://podatki.gov.pl/podatki-osobiste/pit/informacje-podstawowe/co-jest-opodatkowane/dochody-z-pracy',
            'https://www.zus.pl/o-zus/o-nas/programy-transformacji-cyfrowej-zus/zmiany-od-2022-r./faq',
            'https://www.zus.pl/baza-wiedzy/skladki-wskazniki-odsetki/skladki/wysokosc-skladek-na-ubezpieczenia-spoleczne',
            'https://eli.gov.pl/eli/MP/2025/1206/ogl',
            'https://www.mojeppk.pl/aktualnosci/jak-utworzyc-ppk-przekazuj-wplaty-do-ppk-1023n.html',
        ],
    ],
];
