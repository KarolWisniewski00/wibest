<h2>Nowa wiadomość z formularza kontaktowego WIBEST</h2>

<p>
    <strong>Imię i nazwisko:</strong>
    {{ $name }}
</p>

<p>
    <strong>Email:</strong>
    {{ $email }}
</p>

<p>
    <strong>Telefon:</strong>
    {{ $phone ?: 'Nie podano' }}
</p>

<hr>

<p>
    <strong>Wiadomość:</strong>
</p>

<p>
    {!! nl2br(e($contactMessage)) !!}
</p>