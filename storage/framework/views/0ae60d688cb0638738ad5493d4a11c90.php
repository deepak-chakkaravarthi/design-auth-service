<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2>Login</h2>
    <form id="loginForm">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div id="errorMessage" class="text-danger mt-2" style="display: none;"></div>
</div>

<script>
    $('#loginForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        var formData = {
            username: $('#username').val(),
            password: $('#password').val(),
        };

        // CSRF token
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
    url: '/api/login', // Login API endpoint
    type: 'POST',
    data: formData,
    headers: {
        'X-CSRF-TOKEN': token,
    },
    success: function(response) {
        if (response.user) {
            // Store the token in local storage or session
            localStorage.setItem('token', response.token);

            // Redirect to the user details page with the user ID
            window.location.href = '/users'; // Use response.user.id
        } else {
            $('#errorMessage').text('User data not found in response').show();
        }
    },
    error: function(xhr) {
        $('#errorMessage').text(xhr.responseJSON.error || 'Something went wrong').show();
    }
});

    });
</script>

</body>
</html>
<?php /**PATH C:\Users\DPK\secure-auth-system\secure-auth-system\resources\views/auth/login.blade.php ENDPATH**/ ?>