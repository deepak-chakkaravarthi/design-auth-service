<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Register</title>

    <!-- Link to Bootstrap CSS for modern, responsive design -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles if needed -->
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
    <h2 class="text-center mb-4">Register</h2>

    <form id="registerForm">
        <!-- Username -->
        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" required placeholder="Enter your username">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Create a password">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <div class="text-center mt-3">
        <p>Already have an account? <a href="/login">Login here</a></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Handling form submission using AJAX
    $('#registerForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Get the CSRF token from the meta tag
        var token = $('meta[name="csrf-token"]').attr('content');

        // Get form data
        var formData = {
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val(),
        };

        // Make AJAX request
        $.ajax({
            url: '/register',  // The route to handle registration
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': token // Add CSRF token to the headers
            },
            success: function(response) {
                // Registration successful, redirect to login page
                window.location.href = '/login'; // Redirect to login page
            },
            error: function(xhr, status, error) {
                // Handle error
                alert('Registration failed: ' + error);
            }
        });
    });
</script>

</body>
</html>
<?php /**PATH C:\Users\DPK\secure-auth-system\secure-auth-system\resources\views/auth/register.blade.php ENDPATH**/ ?>