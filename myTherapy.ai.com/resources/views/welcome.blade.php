<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container mt-5">
    <form id="login-form" class="border p-4 rounded">
        @csrf
        <div class="text-center mb-4">
            <img src="img_avatar2.png" alt="Avatar" class="avatar rounded-circle">
        </div>

        <div id="error-message" class="alert alert-danger" style="display: none;"></div>

        <div class="form-group">
            <label for="uname"><b>Username</b></label>
            <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
        </div>

        <div class="form-group">
            <label for="psw"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>

        <div class="form-group text-center">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('login-form');
        const errorMessage = document.getElementById('error-message');

        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            // Clear previous error message
            errorMessage.style.display = 'none';
            errorMessage.textContent = '';

            // Get form data
            const formData = new FormData(loginForm);

            // Get CSRF token from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Perform the AJAX request using Fetch API
            fetch('/login', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.login) {
                        // Redirect to the admin dashboard
                        window.location.href = '/admin';
                    } else {
                        // Display the error message
                        errorMessage.textContent = data.error || 'An error occurred. Please try again.';
                        errorMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorMessage.textContent = 'An error occurred. Please try again.';
                    errorMessage.style.display = 'block';
                });
        });
    });
</script>
</body>
</html>
