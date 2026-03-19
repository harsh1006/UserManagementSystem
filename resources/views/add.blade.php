<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5 d-flex justify-content-center">

        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px; border-radius: 12px;">
            
            <h3 class="text-center mb-4 fw-bold">Add User</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/store" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter name" required>
                    <div class="invalid-feedback">
                        Please enter your name
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter email" required>
                    <div class="invalid-feedback">
                        Please enter a valid email
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required minlength="6">
                    <div class="invalid-feedback">
                        Password must be at least 6 characters
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="/" class="btn btn-outline-secondary px-4">Back</a>
                    <button type="submit" class="btn btn-dark px-4">Save</button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>