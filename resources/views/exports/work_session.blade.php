<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Imię i nazwisko</th>
            <th>Status</th>
            <th>Czas w pracy</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sessions as $session)
            <tr>
                <td>{{ $session->id }}</td>
                <td>{{ $session->user->name }}</td>
                <td>{{ $session->status }}</td>
                <td>{{ $session->time_in_work }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
