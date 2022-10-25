<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="{{route('gestion.update',[$promotion->id])}}" method="post">
        @csrf
        @method('PUT')
     nom:<input name="name" value="{{$promotion->name}}" type="text"  >
     @error('name')
         {{$message}}
     @enderror
        <button type="submit">modifier</button>
    </form>
        <!-- for liste de students -->
    <table>
        <input type="search" id="searchstudent" name="searchstudent" placeholder="search student">
            <tbody class="table1">
            @foreach($studentPromo as $values)
                <tr> 
            <td>{{ $values['First_name'] }}</td>
            <td>{{ $values['Last_name'] }}</td>
            <td>{{ $values['Email'] }}</td> 
            <td> <input id="pp" type="hidden" value="{{$values['PromotionID']}}"></td> 
            <td><a href="{{ route('gestion.editstudent',[$values['id']]) }}"><button>update</button></a></td>
            <form action="{{ route('gestionstud.destroy',[$values['id']]) }}" method="POST">
                @csrf
                @method('delete')
                <td><input type="submit" value="delete"></td>
        </form>
        </tr>
        @endforeach
        </tbody>
        {{-- table serch vid --}}
        <tbody id="Content" class="table2">
        </tbody>
    </table>
    <a href="{{route('gestion.insert', $promotion->id)}}">ajouter student</a>
    
    {{-- for search student --}}
    
    <script type="text/javascript">
        $('#searchstudent').on('keyup',function(){
            $value=$(this).val();
            $idp=$('#pp').val();
            if($value){
                $('.table1').hide();
                $('.table2').show();
            }
            else{
                $('.table1').show();
                $('.table2').hide();
            }
            $.ajax({
                type:'get',
                url:'{{URL::to("searchstudent")}}',
                data:{'search':$value,'PromotionID':$idp},
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
        </script>
</body>
</html>
