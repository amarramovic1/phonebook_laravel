<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocetna strana</title>
</head>
<body>
    <h3>{{$message}}</h3>
    <p>Ovo je uradjeno u phpstorm</p>
    @if(count($contacts)<=3)
        <ul>
            @foreach($contacts as $contact)
                <li>{{$contact['name']}}</li>
            @endforeach
        </ul>
    @else
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Ime</th>
                <th>Mail</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact['id']}}</td>
                    <td>{{$contact['name']}}</td>
                    <td>{{$contact['email']}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
