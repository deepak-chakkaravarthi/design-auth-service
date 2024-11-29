<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Remove Role</title>

    <!-- Link to Bootstrap CSS for modern design -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Remove Role</h2>

    <form action="{{ route('user.remove-role', $user->id) }}" method="POST">
        @csrf

        <!-- Select Role to Remove -->
        <div class="form-group">
            <label for="role_id" class="form-label">Select Role to Remove</label>
            <select name="role_id" id="role_id" class="form-control" required>
                <option value="1">Admin</option>
                <option value="2">User</option>
                <!-- Add more roles if necessary -->
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-danger">Remove Role</button>
    </form>

    <!-- Cancel Link -->
    <div class="text-center mt-3">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
