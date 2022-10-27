<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/editstudent.css')}}" />
</head>
<body>
    <table>
<form action="{{route('gestionstud.update',[$student->id])}}" method="post">
    @csrf
    @method('PUT')
    <tr>
 <td id="label">first name:</td><td><input name="First_name" value="{{$student->First_name}}" type="text"></td></tr>
 <tr><td id="label">last name:</td><td><input name="Last_name" value="{{$student->Last_name}}" type="text"  ></td></tr>
 <tr><td id="label"> email:</td><td><input name="Email" value="{{$student->Email}}" type="email"></td></tr>
 <tr><td><input name="PromotionID" type="hidden" value="{{$student->PromotionID}}"></td></tr>

 <tr><td></td><td><button type="submit">Update</button></td></tr>
</form>
</table>
</body>
</html>