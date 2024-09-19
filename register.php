<?php
require "config/database.php"
?>

<form id="registerForm" method="POST">
    <label>First Name:</label>
    <input type="text" name="firstname" required><br>

    <label>Last Name:</label>
    <input type="text" name="lastname" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Phone Number:</label>
    <input type="text" name="phonenumber" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Role:</label>
    <select disabled name="role" required>
        <option value="user">User</option>

        <!-- Admin accounts should be created manually -->
    </select><br>

    <button type="submit">Register</button>
</form>

<!-- jQuery for AJAX request -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $("#registerForm").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= ROOT_URL ?>logic/register-logic.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response == 'success') {
                    alert('Registration successful! You can now log in.');
                    window.location.href = '<?= ROOT_URL ?>login.php';
                } else {
                    alert('Registration failed: ' + response);
                }
            }
        });
    });
</script>

<?php
require "./includes/footer.php"
?>