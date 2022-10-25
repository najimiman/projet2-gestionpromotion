<form action="{{route('gestion.store')}}" method="post">
    @csrf
 nom:<input name="name" type="text"  >
 @error('name')
     {{$message}}
 @enderror
    <button type="submit">ajouter</button>
</form>