<?php
require "config/database.php"; // Make sure this is correctly included
?>

<form id="loginForm" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Login</button>
</form>

<!-- jQuery for AJAX request -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $("#loginForm").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= ROOT_URL ?>logic/login-logic.php', // Ensure this path is correct
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Handle login success or error response here
                    if (response == 'admin') {
                        window.location.href = '<?= ROOT_URL ?>admin/index.php'; // Redirect to admin dashboard
                    } else if (response == 'user') {
                        window.location.href = '<?= ROOT_URL ?>user_dashboard.php'; // Redirect to user dashboard
                    } else if (response == 'driver') {
                        window.location.href = '<?= ROOT_URL ?>driver_dashboard.php'; // Redirect to driver dashboard
                    } else {
                        alert("login failed!"); // Display error message
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });
    });
</script>

<?php
require "./includes/footer.php"; // Ensure this file is correctly included
?>