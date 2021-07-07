<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel</title>
</head>
<body>
    <table>
        <thead>
            <th>name:</th>
            <th>email:</th>
            <th>mobile-no:</th>
            <th colspan="2">Action:</th>
        </thead>
        
            @foreach($user as $data)
            <tbody>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->mobile_no}}</td>
                <td><a href="users/{{$data->id}}/edit">Edit</a></td>      
                <form action="users/{{$data->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit"><i class="fa fa-trash"></i>delete</button>
                  </form>
            @endforeach 
               </tbody>
    </table>
</body>
</html>