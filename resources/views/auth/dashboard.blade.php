<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-header">{{ __('DashBoard') }}</div>
        <div class="card-body">
    <div class="col-md-6 col-md-offset-3">
        <h1 center="text-center">Dashboard</h1>
        <form action ="get">
            <div>
            <table>
               <thead>
                   <th>Name:</th>
                   <th>Email:</th>
                   <th>Action:</th>
               </thead>
               <tbody>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td><a href="logout">Logout</td>
                  <td><a href="profile">Profile</a></td>
                </tbody>
            </table>
        </form>
    </div>
  </div>
</body>
</html>