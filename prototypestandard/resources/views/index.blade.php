<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @if(session('status'))
    <h1>{{ session('status') }}</h1>
    @endif
    <a href="/insert">ajouter</a>
    <table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($promotions as $value)
            
        <tr>
            <th>{{$value->id}}</th>
            <td>{{$value->name}}</td>
            <td>
                <a href="edit/{{$value->id}}"><button>Edit</button></a>
                <a href="delete/{{$value->id}}"><button>Delete</button></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</body>
</html>