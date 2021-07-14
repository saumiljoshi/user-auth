<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container box">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if($message = Session::get('success'))
        <div class ="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>
        @endif
    <form method='post' action= "{{url('sendemail/send')}}">
    @csrf
  <div class="form-group">
      <label>enter your name:</label>
      <input type="text" name="name" class="form-control"/>
      <label>enter your Email:</label>
      <input type="text" name="email" class="form-control"/>
      <label>enter your message:</label>
      <input type="text" name="message" class="form-control"/>
      <input type="submit" name="submit" value="Submit"/>
</form>
    </div>
</div>
</body>
</html>