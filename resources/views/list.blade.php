
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Listing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        setTimeout(function () {
            let alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.transition = "opacity 0.5s";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
</head>

<body class="bg-light">

<div class="container mt-5">

    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Users Listing</h3>
        <a href="/add" class="btn btn-dark px-4">+ Add User</a>
    </div>

    
    @if(session('success'))
        <div id="success-alert" class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-semibold">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    <a href="/edit/{{$user->id}}" class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>

                                    <form method="POST" action="/delete/{{ $user->id }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button> 
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach        
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>