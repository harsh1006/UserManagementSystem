<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h3>USERS LISTING</h3>
    <div class="d-flex justify-content-end me-3"><a href="/add" class="btn btn-dark">Add</a></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr.no</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td><a href="" class="btn btn-sm btn-primary">Edit</a></td>
            </tr>
        @endforeach        
    </tbody>
    </table>
</body>
</html>