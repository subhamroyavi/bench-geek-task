<!DOCTYPE html>
<html>
<head>
    <title>task Table</title>
    
</head>
<body>
    <h1>task List</h1>
     <table border="1px">
        
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task['id'] }}</td>
                <td><img src="{{ $task['image'] }}" width="50" height="50" alt="Profile"></td>
                <td>{{ $task['firstName'] }} {{ $task['lastName'] }}</td>
                <td>{{ $task['email'] }}</td>
                <td>{{ $task['phone'] }}</td>
                <td>{{ ucfirst($task['gender']) }}</td>
                <td>{{ $task['age'] }}</td>
                <td>{{ $task['university'] }}</td>
                <td>{{ $task['bloodGroup'] }}</td>
                <td>{{ $task['hair']['color'] }} / {{ $task['hair']['type'] }}</td>
                <td>{{ $task['eyeColor'] }}</td>
                <td>
                    {{ $task['address']['address'] }},
                    {{ $task['address']['city'] }},
                    {{ $task['address']['state'] }},
                    {{ $task['address']['country'] }}
                </td>
                <td>
                    {{ $task['company']['title'] }} at {{ $task['company']['name'] }},
                    {{ $task['company']['department'] }}
                </td>
                <td>
                    {{ $task['bank']['cardType'] }}<br>
                    {{ $task['bank']['cardNumber'] }}<br>
                    Exp: {{ $task['bank']['cardExpire'] }}
                </td>
                <td>
                    {{ $task['crypto']['coin'] }}<br>
                    Wallet: {{ Str::limit($task['crypto']['wallet'], 20) }}<br>
                    Network: {{ $task['crypto']['network'] }}
                </td>
                <td>{{ ucfirst($task['role']) }}</td>
            </tr>
          
            @endforeach
        </tbody>
    </table>
</body>
</html>
