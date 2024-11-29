<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2>User Details</h2>
    <div id="userDetails">
        <!-- User details will be loaded here -->
    </div>
    <button id="logoutBtn" class="btn btn-warning mt-3">Logout</button>
</div>

<script>
    $(document).ready(function() {
        var token = localStorage.getItem('token');
        var userId = window.location.pathname.split('/').pop(); // Extract user ID from URL

        $.ajax({
            url: '/api/user/' + userId, // Fetch user details from the API
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(response) {
                // Display user details
                $('#userDetails').html(`
                    <p><strong>Username:</strong> ${response.user.username}</p>
                    <p><strong>Email:</strong> ${response.user.email}</p>
                `);
            },
            error: function(xhr) {
                $('#userDetails').html('<p class="text-danger">Error fetching user details.</p>');
            }
        });

        // Logout action
        $('#logoutBtn').on('click', function() {
            $.ajax({
                url: '/api/logout',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // Clear the token and redirect to login
                    localStorage.removeItem('token');
                    window.location.href = '/login';
                }
            });
        });
    });
</script>

</body>
</html>
