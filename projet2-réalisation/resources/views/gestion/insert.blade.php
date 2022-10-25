<form action="{{Route('gestionstud.store')}}" method="POST">
@csrf
first name:<input type="text" name="First_name">
last name:<input type="text" name="Last_name">
email:<input type="email" name="Email">
<input type="text" name="PromotionID" value="{{$id}}">
{{-- {{dd($id)}} --}}
<button type="submit">ajouter</button>
</form>