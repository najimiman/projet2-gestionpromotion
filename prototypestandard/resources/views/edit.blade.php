@foreach ($promotions as $value)
    
<form action="{{url('update')}}/{{$value->id}}" method="post">
    @csrf
    name<input type="text" value="{{$value->name}}" name="name">
    <button>Update</button>
</form>
@endforeach