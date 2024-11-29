import './bootstrap';
// public/js/app.js

// Register User
document.getElementById('registerForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    fetch('http://127.0.0.1:8000/register', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.user) {
            window.location.href = '/login';  // Redirect to login page after registration
        }
    })
    .catch(error => console.log(error));
});

// Login User
document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    fetch('http://127.0.0.1:8000/login', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.token) {
            localStorage.setItem('auth_token', data.token);  // Save token in localStorage
            window.location.href = '/user-details';  // Redirect to user details page
        } else {
            alert('Login failed');
        }
    })
    .catch(error => console.log(error));
});

// Get User Details
document.addEventListener('DOMContentLoaded', function () {
    const token = localStorage.getItem('auth_token');
    if (!token) {
        window.location.href = '/login';  // Redirect to login page if no token
        return;
    }

    fetch('http://127.0.0.1:8000/user/1', {  // Replace 1 with dynamic user ID if needed
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.user) {
            document.getElementById('userDetails').innerHTML = JSON.stringify(data.user, null, 2);
        }
    })
    .catch(error => console.log(error));
});

// Assign Role
document.getElementById('assignRoleBtn').addEventListener('click', function () {
    const token = localStorage.getItem('auth_token');
    if (!token) return;

    const roleId = 1;  // Replace with dynamic role ID
    fetch('http://127.0.0.1:8000/assign-role/1', {  // Replace 1 with dynamic user ID
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ role_id: roleId })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => console.log(error));
});

// Remove Role
document.getElementById('removeRoleBtn').addEventListener('click', function () {
    const token = localStorage.getItem('auth_token');
    if (!token) return;

    const roleId = 1;  // Replace with dynamic role ID
    fetch('http://127.0.0.1:8000/remove-role/1', {  // Replace 1 with dynamic user ID
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ role_id: roleId })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => console.log(error));
});

// Update User
document.getElementById('updateUserBtn').addEventListener('click', function () {
    const token = localStorage.getItem('auth_token');
    if (!token) return;

    const updatedData = {
        username: 'UpdatedUsername',  // Replace with actual data
        email: 'updatedemail@example.com'  // Replace with actual data
    };

    fetch('http://127.0.0.1:8000/user/1', {  // Replace 1 with dynamic user ID
        method: 'PUT',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(updatedData)
    })
    .then(response => response.json())
    .then(data => {
        alert('User updated successfully');
    })
    .catch(error => console.log(error));
});

// Logout User
document.getElementById('logoutBtn').addEventListener('click', function () {
    const token = localStorage.getItem('auth_token');
    if (!token) return;

    fetch('http://127.0.0.1:8000/logout', {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => response.json())
    .then(data => {
        localStorage.removeItem('auth_token');
        window.location.href = '/login';  // Redirect to login page after logout
    })
    .catch(error => console.log(error));
});
