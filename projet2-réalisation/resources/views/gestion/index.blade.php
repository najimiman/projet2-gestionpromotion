<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="page1">
    <div class="ps">
    <input placeholder="serch" type="search" id="search" name="search">
    <a href="gestion/create" id="add">Add promotion</a></div>
    <table class="customers">
        <tbody class="table1">
        @foreach($promotions as $value)
            <tr> 
        <td>{{ $value['name'] }}</td>
        <td class="td1"><a href="{{ route('gestion.edit',[$value['id']]) }}"><button>update</button></a></td>
    
        <td class="td1"><form action="{{ route('gestion.destroy',[$value['id']]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </td>
    </form>
    </tr>
    @endforeach
    </tbody>
    <tbody id="Content" class="table2">
    </tbody>
    </table>
    </div>
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