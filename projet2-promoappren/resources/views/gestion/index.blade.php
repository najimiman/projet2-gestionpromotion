<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <input placeholder="serch" type="search" id="search" name="search">
    <table>
        <tbody class="table1">
        @foreach($promotions as $value)
            <tr> 
        <td>{{ $value['name'] }}</td>
        <td><a href="{{ route('gestion.edit',[$value['id']]) }}"><button>update</button></a></td>
    
        <form action="{{ route('gestion.destroy',[$value['id']]) }}" method="POST">
            @csrf
            @method('delete')
            <td><input type="submit" value="delte"></td>
    </form>
    </tr>
    @endforeach
    </tbody>
    <tbody id="Content" class="table2">
    </tbody>
    </table>
    <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
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
                url:'{{URL::to("search")}}',
                data:{'search':$value},
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
        </script>
</body>
</html>