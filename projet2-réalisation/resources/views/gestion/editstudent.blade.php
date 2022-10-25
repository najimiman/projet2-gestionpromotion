<form action="{{route('gestionstud.update',[$student->id])}}" method="post">
    @csrf
    @method('PUT')
 first name:<input name="First_name" value="{{$student->First_name}}" type="text"  >
 last name:<input name="Last_name" value="{{$student->Last_name}}" type="text"  >
 email:<input name="Email" value="{{$student->Email}}" type="email"  >
 idpromotion:<input name="PromotionID" value="{{$student->PromotionID}}">

    <button type="submit">modifier</button>
</form>