<!-- resources/views/users/update-user.blade.php -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="modal" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Update User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="updateUserForm">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" value="{{ $user->username }}" required placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" value="{{ $user->email }}" required placeholder="Enter email">
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitUpdateUser()">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    // This function will be called when the "Save Changes" button is clicked
    function submitUpdateUser() {
        // Get the values of the input fields
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;

        // Prepare form data
        var formData = new FormData();
        formData.append('username', username);
        formData.append('email', email);
        formData.append('_token', '{{ csrf_token() }}');  // CSRF token for security

        // Send AJAX request to update the user
        fetch('{{ route("user.update-user", ":id") }}'.replace(':id', {{ $user->id }}), {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.user) {
                alert('User updated successfully');
                // Optionally, close the modal or update the UI
                $('#updateUserModal').modal('hide'); // If using Bootstrap's modal
            } else {
                alert('Failed to update user');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred');
        });
    }

    // Ensure that aria-hidden is toggled correctly when modal is shown or hidden
    $('#updateUserModal').on('show.bs.modal', function () {
        this.setAttribute('aria-hidden', 'false');
    }).on('hidden.bs.modal', function () {
        this.setAttribute('aria-hidden', 'true');
    });
</script>

<!-- Optional Styling for better design -->
<style>
    /* Modal Header */
    .modal-header {
        background-color: #28a745;
        color: white;
        border-bottom: 2px solid #ddd;
    }

    .modal-header .btn-close {
        background-color: transparent;
        border: none;
        color: white;
    }

    /* Modal Body */
    .modal-body {
        padding: 20px;
        background-color: #f9f9f9;
    }

    /* Modal Footer */
    .modal-footer {
        border-top: 2px solid #ddd;
        background-color: #f9f9f9;
    }

    /* Form Field Styles */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
    }

    /* Button Styles */
    .btn-primary {
        background-color: #28a745;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .btn-outline-secondary {
        border-color: #ccc;
        color: #666;
        padding: 8px 16px;
        font-size: 16px;
        border-radius: 5px;
        transition: color 0.3s ease, border-color 0.3s ease;
    }

    .btn-outline-secondary:hover {
        border-color: #28a745;
        color: #28a745;
    }

    /* Modal Content */
    .modal-content {
        border-radius: 8px;
    }
</style>
