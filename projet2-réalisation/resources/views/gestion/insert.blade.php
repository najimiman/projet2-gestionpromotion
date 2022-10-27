<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/insert.css')}}" />
</head>
<body>
<table>
<form action="{{Route('gestionstud.store')}}" method="POST">
@csrf
<tr><td id="label">first name:</td><td><input type="text" name="First_name" value="{{old('First_name')}}" placeholder="first name">
@error('First_name')
     {{$message}}
 @enderror</td></tr>
<tr><td id="label">last name:</td><td><input type="text" name="Last_name" value="{{old('Last_name')}}" placeholder="last name">
@error('Last_name')
     {{$message}}
 @enderror</td></tr>
<tr><td id="label">email:</td><td><input type="email" name="Email" placeholder="email"></td></tr>
<input type="hidden" name="PromotionID" value="{{$id}}"></tr>
{{-- {{dd($id)}} --}}
<tr><td></td><td><button type="submit">Add</button></td></tr>
</form>
</table>
</body>
</html>