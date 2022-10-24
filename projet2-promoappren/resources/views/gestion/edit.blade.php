<form action="{{route('gestion.update',[$promotion->id])}}" method="post">
    @csrf
    @method('PUT')
 nom:<input name="name" value="{{$promotion->name}}" type="text"  >
 @error('name')
     {{$message}}
 @enderror
    <button type="submit">modifier</button>
</form>