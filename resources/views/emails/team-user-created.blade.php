<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&amp;display=swap" rel="stylesheet">
    <title>WIBEST – Nowy użytkownik</title>
    <style>
        @media only screen and (max-width:480px) {
            .email-content { padding:24px !important; }
            .email-title { font-size:26px !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif;color:#111827;line-height:1.6;-webkit-text-size-adjust:100%">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f3f4f6">
    <tr>
        <td align="center" style="padding:32px 12px">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;background-color:#ffffff;border:1px solid #e5e7eb;border-radius:16px;overflow:hidden">
                <tr>
                    <td class="email-content" style="padding:24px 36px;background-color:#111827;border-radius:16px 16px 0 0;border-bottom:3px solid #86efac">
                        <span class="sm:order-1 text-green-300 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 dark:text-green-300" style="font-family:&quot;Raleway&quot;,Arial,sans-serif;font-size:20px;line-height:28px;font-weight:600;color:#86efac">WIBEST</span>
                    </td>
                </tr>
                <tr>
                    <td class="email-content" style="padding:32px 36px 36px">
                        <h1 class="email-title" style="margin:0 0 12px;font-size:30px;line-height:1.2;font-weight:600;letter-spacing:-0.5px;color:#111827">Nowy użytkownik w firmie</h1>
                        <p style="margin:0 0 24px;font-size:16px;line-height:1.6;color:#4b5563">W systemie WIBEST zostało utworzone nowe konto użytkownika.</p>
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="table-layout:fixed;border-top:1px solid #e5e7eb">
                            @foreach (['company' => 'Firma', 'name' => 'Nowy użytkownik', 'email' => 'Adres e-mail', 'role' => 'Rola', 'created_at' => 'Data utworzenia'] as $key => $label)
                                @if ($key !== 'email' || !empty($details[$key]))
                                    <tr>
                                        <td style="padding:16px 0;border-bottom:1px solid #e5e7eb;overflow-wrap:anywhere;word-wrap:break-word">
                                            <span style="font-size:14px;line-height:1.5;color:#4b5563">{{ $label }}:</span><br>
                                            <span style="font-size:17px;line-height:1.6;font-weight:500;color:#111827">{{ $details[$key] }}</span>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-top:24px">
                            <tr>
                                <td style="padding:16px 20px;border-left:3px solid #86efac;background-color:#f9fafb;border-radius:0 8px 8px 0">
                                    <p style="margin:0;font-size:14px;line-height:1.6;color:#374151">Konto zostało pomyślnie utworzone w systemie WIBEST.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
