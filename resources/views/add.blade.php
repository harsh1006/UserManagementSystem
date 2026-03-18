<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="mb-4">Add User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/store" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                <div class="invalid-feedback">
                    Please enter your name
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                <div class="invalid-feedback">
                    Please enter a valid email
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required minlength="6">
                <div class="invalid-feedback">
                    Password must be at least 6 characters
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2">
                <a href="/" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-dark">Save</button>
            </div>

        </form>

    </div>

</body>
</html>